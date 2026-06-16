<?php
namespace App\Models;

class Product extends BaseModel{
    protected $table = "posts";

    public function getALL(){
        $sql = "SELECT posts.* ,categories.name as cate_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getbyid($id){
        $sql = "SELECT posts.* ,categories.name as cate_name FROM posts LEFT JOIN categories ON posts.category_id = categories.id WHERE posts.id = $id";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function creat($category_id,$name,$img_thumbnail,$overview,$content,$created_at){
        $sql = "INSERT INTO  posts(category_id,name,img_thumbnail,overview,content,created_at) VALUES(?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$category_id,$name,$img_thumbnail,$overview,$content,$created_at]);
    }
    public function update($id,$category_id,$name,$img_thumbnail,$overview,$content){
        $sql = "UPDATE posts SET category_id = ?, name = ?, img_thumbnail = ?, overview = ?, content = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$category_id,$name,$img_thumbnail,$overview,$content,$id]);
    }
    public function delete($id){
        $sql = "DELETE FROM posts WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getAllcategori(){
        $sql = "SELECT * FROM categories";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    

}


?>