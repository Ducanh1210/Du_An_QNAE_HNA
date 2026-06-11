<?php
require_once 'env.php';

try {
    $pdo = new PDO(
        "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=" . DBCHARSET,
        DBUSER,
        DBPASS,
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DBCHARSET,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    );

    // Xóa sản phẩm cũ để tránh trùng lặp
    $pdo->exec("DELETE FROM products");
    $pdo->exec("DELETE FROM news");

    // Lấy ID của danh mục "Đồ ăn" (thường là 1) và "Món nướng" (thường là 3)
    $stmt = $pdo->query("SELECT id FROM categories WHERE slug = 'do-an' OR slug = 'mon-nuong' LIMIT 1");
    $catProduct = $stmt->fetch();
    $catId = $catProduct ? $catProduct->id : 1;

    // Chèn sản phẩm mẫu (dựa trên danh sách gốc ở trang chủ)
    $products = [
        [
            'category_id' => $catId,
            'name' => 'Trâu xào rau muống',
            'slug' => 'trau-xao-rau-muong',
            'price' => 159000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Trâu tươi xào tỏi và rau muống giòn ngọt xanh mướt.',
            'content' => 'Món nhậu cổ điển nhưng không bao giờ lỗi thời. Thịt trâu dai ngọt xào cùng rau muống chín tới giữ nguyên vị giòn ngọt, thơm lừng mùi tỏi phi.',
            'is_active' => 1,
            'sort_order' => 1
        ],
        [
            'category_id' => $catId,
            'name' => 'Đậu pháp xào trứng non sốt XO',
            'slug' => 'dau-phap-xao-trung-non-sot-xo',
            'price' => 189000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Đậu pháp giòn sần sật xào trứng non béo bùi và sốt XO đậm đà.',
            'content' => 'Món ăn cao cấp với trứng non vàng óng thơm ngon, đậu pháp thái lát vừa ăn xào chung sốt XO đặc trưng mang lại hương vị khó cưỡng.',
            'is_active' => 1,
            'sort_order' => 2
        ],
        [
            'category_id' => $catId,
            'name' => 'Lợn mán nướng giềng mẻ',
            'slug' => 'lon-man-nuong-gieng-me',
            'price' => 229000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Thịt lợn mán nướng thơm nức mùi riềng sả và mẻ chua thanh.',
            'content' => 'Lợn mán được tuyển chọn kỹ lưỡng, tẩm ướp riềng mẻ theo bí quyết riêng của quán nướng trên than hoa chín vàng thơm phức.',
            'is_active' => 1,
            'sort_order' => 3
        ],
        [
            'category_id' => $catId,
            'name' => 'Ốc hương ủ muối thảo mộc',
            'slug' => 'oc-huong-u-muoi-thao-moc',
            'price' => 269000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Ốc hương tươi sống ủ muối cùng các loại thảo mộc tự nhiên thơm dịu.',
            'content' => 'Từng con ốc hương thơm giòn, ngọt thịt quyện với muối thảo mộc mằn mặn thơm nồng nàn.',
            'is_active' => 1,
            'sort_order' => 4
        ],
        [
            'category_id' => $catId,
            'name' => 'Nầm sữa nướng giềng mẻ',
            'slug' => 'nam-sua-nuong-gieng-me',
            'price' => 189000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Nầm sữa giòn sần sật nướng cùng hương vị riềng mẻ truyền thống.',
            'content' => 'Nầm sữa tươi cắt miếng vừa ăn, tẩm ướp đậm đà riềng, mẻ, sả nướng xém cạnh vô cùng hấp dẫn.',
            'is_active' => 1,
            'sort_order' => 5
        ],
        [
            'category_id' => $catId,
            'name' => 'Tôm sú ủ muối thảo mộc',
            'slug' => 'tom-su-u-muoi-thao-moc',
            'price' => 249000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Tôm sú tươi roi rói hấp/ủ muối thảo mộc thơm ngon thanh khiết.',
            'content' => 'Vị ngọt tự nhiên của tôm sú biển kết hợp hoàn hảo cùng hương thơm thảo mộc khi ủ muối.',
            'is_active' => 1,
            'sort_order' => 6
        ],
        [
            'category_id' => $catId,
            'name' => 'Cá dưa chua tứ xuyên',
            'slug' => 'ca-dua-chua-tu-xuyen',
            'price' => 469000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Cá tươi nấu dưa chua kiểu Tứ Xuyên cay tê đậm đà đưa miệng.',
            'content' => 'Hương vị cay nồng đặc trưng của ẩm thực Tứ Xuyên hòa quyện vị dưa cải chua dịu ngọt thanh của thịt cá.',
            'is_active' => 1,
            'sort_order' => 7
        ],
        [
            'category_id' => $catId,
            'name' => 'Ếch sốt tiêu gừng chua cay',
            'slug' => 'ech-sot-tieu-gung-chua-cay',
            'price' => 159000,
            'img_thumbnail' => 'images/produc.webp',
            'overview' => 'Thịt ếch đồng săn chắc chiên giòn sốt tiêu gừng chua cay cay.',
            'content' => 'Món ăn đậm đà bắt mồi với thịt ếch đồng dai ngọt, quyện nước sốt chua cay ấm nồng mùi tiêu gừng.',
            'is_active' => 1,
            'sort_order' => 8
        ]
    ];

    $stmtProd = $pdo->prepare("INSERT INTO products (category_id, name, slug, price, img_thumbnail, overview, content, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($products as $p) {
        $stmtProd->execute([
            $p['category_id'],
            $p['name'],
            $p['slug'],
            $p['price'],
            $p['img_thumbnail'],
            $p['overview'],
            $p['content'],
            $p['is_active'],
            $p['sort_order']
        ]);
    }

    // Lấy ID danh mục "Ưu đãi" (slug = uu-dai, type = news, ID thường là 4)
    $stmtCatNews = $pdo->query("SELECT id FROM categories WHERE slug = 'uu-dai' OR slug = 'tin-tuc' LIMIT 1");
    $catNews = $stmtCatNews->fetch();
    $catNewsId = $catNews ? $catNews->id : 4;

    // Chèn tin tức khuyến mãi mẫu
    $news = [
        [
            'category_id' => $catNewsId,
            'title' => 'NHÂN ĐÔI NIỀM VUI VỚI ƯU ĐÃI COCKTAIL CHO CHỊ EM',
            'slug' => 'nhan-doi-niem-vui-voi-uu-dai-cocktail-cho-chi-em',
            'img_thumbnail' => '',
            'overview' => 'Chương trình ưu đãi cực hot dành riêng cho hội chị em bạn dì khi ghé quán thưởng thức cocktail mát lạnh.',
            'content' => 'Nhân đôi niềm vui - Quán dành tặng riêng ưu đãi đặc biệt cho bàn có khách nữ dùng cocktail. Liên hệ đặt bàn ngay!',
            'is_active' => 1
        ],
        [
            'category_id' => $catNewsId,
            'title' => 'TẶNG 5000 PHAO BƠI CỐC SỦI TĂM CHO BẰNG HỮU',
            'slug' => 'tang-5000-phao-boi-coc-sui-tam-cho-bang-huu',
            'img_thumbnail' => '',
            'overview' => 'Mùa hè rực rỡ, quán tặng phao bơi độc lạ kèm những cốc bia sủi tăm mát rượi giải nhiệt cực đã.',
            'content' => 'Chương trình tri ân mùa hè dành cho các bằng hữu yêu thích bia sủi tăm. Đặt bàn nhận quà liền tay!',
            'is_active' => 1
        ],
        [
            'category_id' => $catNewsId,
            'title' => '1K MỞ DEAL MỞ TRẢI NGHIỆM ĐỘC ĐÁO',
            'slug' => '1k-mo-deal-mo-trai-nghiem-doc-dao',
            'img_thumbnail' => '',
            'overview' => 'Nhận ngay deal món ngon giá chỉ 1.000 đồng khi đạt mức hóa đơn yêu cầu cực kỳ dễ dàng.',
            'content' => 'Mở deal cực sốc chỉ với 1k cho một món best seller tự chọn. Áp dụng cho tất cả các ngày trong tuần.',
            'is_active' => 1
        ],
        [
            'category_id' => $catNewsId,
            'title' => 'ĂN TRƯA ANH EM KHÔNG LO NẮNG MƯA',
            'slug' => 'an-trua-anh-em-khong-lo-nang-mua',
            'img_thumbnail' => '',
            'overview' => 'Thực đơn cơm trưa văn phòng và món nhậu trưa đa dạng, giao hàng siêu tốc tận nơi.',
            'content' => 'Ăn trưa cực chill tại không gian điều hòa mát mẻ của quán hoặc gọi ship tận văn phòng với combo trọn gói.',
            'is_active' => 1
        ],
        [
            'category_id' => $catNewsId,
            'title' => 'SINH NHẬT ĐỘC NHẤT - SỐNG CHẤT ANH EM PHIÊN BẢN 2026',
            'slug' => 'sinh-nhat-doc-nhat-song-chat-anh-em-2026',
            'img_thumbnail' => '',
            'overview' => 'Trọn gói trang trí sinh nhật miễn phí cùng quà tặng bất ngờ khi đặt bàn trước tại Quán Nhậu Anh Em.',
            'content' => 'Sự kiện sinh nhật của bạn sẽ trở nên hoành tráng và ý nghĩa hơn bao giờ hết với sự phục vụ chu đáo của đội ngũ nhân viên.',
            'is_active' => 1
        ],
        [
            'category_id' => $catNewsId,
            'title' => 'SỰ KIỆN GẶP GỠ BẰNG HỮU CUỐI TUẦN',
            'slug' => 'su-kien-gap-go-bang-huu-cuoi-tuan',
            'img_thumbnail' => '',
            'overview' => 'Điểm hẹn lý tưởng cuối tuần cho các cuộc sum họp bằng hữu với menu đồ nướng xèo xèo hấp dẫn.',
            'content' => 'Cùng bằng hữu hàn huyên tâm sự bên ly bia và các món mồi bén cuối tuần trong không gian âm nhạc sôi động.',
            'is_active' => 1
        ]
    ];

    $stmtNews = $pdo->prepare("INSERT INTO news (category_id, title, slug, img_thumbnail, overview, content, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($news as $n) {
        $stmtNews->execute([
            $n['category_id'],
            $n['title'],
            $n['slug'],
            $n['img_thumbnail'],
            $n['overview'],
            $n['content'],
            $n['is_active']
        ]);
    }

    echo "Seed data completed successfully!\n";
    echo "Inserted " . count($products) . " products.\n";
    echo "Inserted " . count($news) . " news.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
