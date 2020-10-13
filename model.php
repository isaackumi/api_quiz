

<?php
require_once('db_class.php');


class API extends db_connection
{


//    ##########      BRANDS  ################################






    function fetchOne($country){
        $sql = "SELECT * FROM country WHERE `fullname`='$country'";
        return $this->db_query($sql);
    }


























    function create(){

        $sql="INSERT into posts VALUES('$brand')";
        return $this->db_query($sql);

    }


    function fetchAll(){
        $sql = 'SELECT * FROM posts';
        return $this->db_query($sql);
    }


    function delete_brand($id){
        $sql = "DELETE FROM brands WHERE `brand_id`= '$id'";
        return $this->db_query($sql);
    }


    function update_brand($brand,$id){
        $sql = "UPDATE brands SET `brand_name` = '$brand' WHERE `brand_id`= '$id'";
        return $this->db_query($sql);
    }


    //    ##########      BRANDS  - END   ################################



//    ##########      CATEGORY  ################################
    function add_product_category($category){

        $sql="INSERT into categories(`cat_name`) VALUES('$category')";
        return $this->db_query($sql);
    }

    function get_categories(){
        $sql = 'SELECT * FROM categories';
        return $this->db_query($sql);
    }

    function get_one_category($id){
        $sql = "SELECT * FROM categories WHERE `cat_id`= '$id'";
        return $this->db_query($sql);
    }


    function get_category_name($cat_id){
        $sql = "SELECT cat_name FROM categories WHERE `cat_id` = '$cat_id'";
        return $this->db_query($sql);
    }

    function delete_category($id){
        $sql = "DELETE FROM categories WHERE `cat_id`= '$id'";
        return $this->db_query($sql);
    }


    function update_category($cat,$id){
        $sql = "UPDATE categories SET `cat_name` = '$cat' WHERE `cat_id`= '$id'";
        return $this->db_query($sql);
    }



//    ##########      CATEGORY  - END   ################################






//    ##########      PRODUCTS  ################################


    public function add_new_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image){

        //Write the insert sql
        $sql = "INSERT INTO products(product_cat, product_brand, product_title, product_price, product_desc, product_image) VALUES('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image')";
        //execute the sql and return boolean
        return $this->db_query($sql);
    }

    public function view_all_products(){
        //a query to get all products
        $sql = "SELECT * FROM products";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function view_products($category){
        //a query to get all products
        $sql = "SELECT * FROM products where category='$category'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }


    public function update_one_product($category_id,$brand_id,$prod_title,$prod_price,$prod_desc,$fileName,$product_id){
        //a query to update a product
        $sql = "UPDATE products
                        SET `product_title`='$prod_title',
                            `product_cat`='$category_id',
                            `product_brand`='$brand_id',
                            `product_desc`='$prod_desc' ,
                            `product_price`='$prod_price',
                            `product_image`='$fileName'
                WHERE product_id='$product_id'";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    /**
     *method to delete a product using an id
     *takes the id
     */
    public function delete_one_product($a){
        //a query to delete product using an id
        $sql = "DELETE from products WHERE product_id=$a";

        //execute the query and return boolean
        return $this->db_query($sql);
    }

    public function get_one_product($a){
        //a query to delete product using an id
        $sql = "SELECT * FROM `products` WHERE product_id=$a";

        //execute the query and return boolean
        return $this->db_query($sql);
    }


  }

// $p = new API();
// print_r($p->fetchOne(1));

  ?>
