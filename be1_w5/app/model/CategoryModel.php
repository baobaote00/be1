<?php
class CategoryModel extends Db
{
    public function getCategories()
    {
        $sql = parent::$connection->prepare("SELECT * FROM categories");
        return parent::select($sql);
    }
}
