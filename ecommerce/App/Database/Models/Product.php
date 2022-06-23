<?php
namespace App\Database\Models;

use App\Database\Models\Contracts\Crud;

class Product extends Model implements Crud {
    private $id,$name_en,$name_ar,$price,$code,$quantity,$desc_en,$desc_ar,$brand_id,$subcategory_id,$category_id,$image,$status,
    $created_at,$updated_at;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of desc_en
     */ 
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */ 
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */ 
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */ 
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of subcategory_id
     */ 
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */ 
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    public function create()
    {
        # code...
    }
    public function read()
    {
        $query = "SELECT * FROM products WHERE status = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$this->status);
        $stmt->execute();
        return $stmt;
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }

    public function productsByBrand()
    {
        $query = "SELECT * FROM products WHERE status = ? AND brand_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$this->status,$this->brand_id);
        $stmt->execute();
        return $stmt;
    }
    public function productsBySubcategory()
    {
        $query = "SELECT * FROM products WHERE status = ? AND subcategory_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$this->status,$this->subcategory_id);
        $stmt->execute();
        return $stmt;
    }
    public function productsByCategory()
    {
        $query = "SELECT * FROM product_details WHERE status = ? AND category_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$this->status,$this->category_id);
        $stmt->execute();
        return $stmt;
    }
    
    

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }
    

    public function getById()
    {
        $query = "SELECT * FROM product_details WHERE status = ? AND id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$this->status,$this->id);
        $stmt->execute();
        return $stmt;
    }

    public function getReviews()
    {
        $query =    "SELECT 
                        CONCAT(`users`.`first_name` , ' ' , `users`.`last_name`) AS `full_name`,
                        `reviews`.`product_id`,
                        `reviews`.`rate`,
                        `reviews`.`comment`,
                        `reviews`.`created_at`
                    FROM `reviews`
                    JOIN `users`
                    ON `reviews`.`user_id` = `users`.`id`
                    WHERE `reviews`.`product_id` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$this->id);
        $stmt->execute();
        return $stmt;
    }
}