<?php 

require('dbclass.php');

//------------------Admin Class-----------------------
class admin extends dbconnection{

	public $admin_id;
	public $admin_name;
    public $admin_email;
	public $admin_password;
	
	
	

	public function create(){
		$query = "INSERT INTO admin(admin_email,admin_password,admin_fullname)
				 VALUES('$this->admin_email','$this->admin_password','$this->admin_name')";
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM admin";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM admin WHERE admin_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){		   	
		$query = " UPDATE admin SET admin_email     = '$this->admin_email',
								    admin_fullname  = '$this->admin_name',
								    admin_password     = '$this->admin_password'
                                   WHERE admin_id = $id";								   
                   
		$this->performQuery($query);
    }
    
	public function delete($id){

		//$id=$_GET['delete_id'];
        $query = "DELETE FROM admin WHERE admin_id =$id ";
        
        $this->performQuery($query);
        
	
	}
	public function login($email,$pass)
    {
        $query="select * from student
                where student_email='$email' AND student_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
}
//------------------Admin Class-----------------------






//------------------Customer Class-----------------------
class customer extends dbconnection{

	public $cust_id;
	public $cust_name;
    public $cust_email;
    public $cust_password;
    public $cust_mobile;
    public $cust_address;
    public $cust_image;


	
	
	

	public function create(){
		$query = "INSERT INTO customer(cust_name,cust_email,cust_password,cust_mobile,cust_address,cust_image)
				 VALUES('$this->cust_name','$this->cust_email','$this->cust_password','$this->cust_mobile','$this->cust_address','$this->cust_image')";
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM customer";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM customer WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
        if(empty($this->cust_image)){	   	
		$query = " UPDATE customer SET cust_name      = '$this->cust_name',
								    cust_email        = '$this->cust_email',
								    cust_password     = '$this->cust_password',
                                    cust_mobile       = '$this->cust_mobile',
                                    cust_address      = '$this->cust_address'
                                    WHERE cust_id     = $id";	
        }else{
        $query = " UPDATE customer SET cust_name      = '$this->cust_name',
                                    cust_email        = '$this->cust_email',
                                    cust_password     = '$this->cust_password',
                                    cust_mobile       = '$this->cust_mobile',
                                    cust_address      = '$this->cust_address',
                                    cust_image        = '$this->cust_image'
                                    WHERE cust_id     = $id";	

        }							          

        $this->performQuery($query);

    }
    
	public function delete($id){

        $query = "DELETE FROM customer WHERE cust_id =$id";
        
        $this->performQuery($query);
        
	
	}
	public function login($email,$pass)
    {
        $query="select * from student
                where student_email='$email' AND student_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
}

//------------------Customer Class-----------------------



//------------------Vendor Class-----------------------
class vendor extends dbconnection{

	public $vendor_id;
	public $vendor_name;
    public $vendor_email;
    public $vendor_password;
    public $vendor_mobile;
    public $vendor_address;
    public $vendor_image;


	
	
	

	public function create(){
		$query = "INSERT INTO vendor(vendor_name,vendor_email,vendor_password,vendor_mobile,vendor_address,vendor_image)
				 VALUES('$this->vendor_name','$this->vendor_email','$this->vendor_password','$this->vendor_mobile','$this->vendor_address','$this->vendor_image')";
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM vendor";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM vendor WHERE vendor_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
        if(empty($this->vendor_image)){	   	
		$query = " UPDATE vendor SET vendor_name        = '$this->vendor_name',
								    vendor_email        = '$this->vendor_email',
								    vendor_password     = '$this->vendor_password',
                                    vendor_mobile       = '$this->vendor_mobile',
                                    vendor_address      = '$this->vendor_address'
                                    WHERE vendor_id     = $id";	
        }else{
        $query = " UPDATE vendor SET vendor_name        = '$this->vendor_name',
                                    vendor_email        = '$this->vendor_email',
                                    vendor_password     = '$this->vendor_password',
                                    vendor_mobile       = '$this->vendor_mobile',
                                    vendor_address      = '$this->vendor_address',
                                    vendor_image        = '$this->vendor_image'
                                    WHERE vendor_id     = $id";	

        }							          

        $this->performQuery($query);

    }
    
	public function delete($id){

        $query = "DELETE FROM vendor WHERE vendor_id =$id";
        
        $this->performQuery($query);
        
	
	}
	public function login($email,$pass)
    {
        $query="select * from student
                where student_email='$email' AND student_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
}

//------------------Vendor Class-----------------------



//------------------Category Class-----------------------
class category extends dbconnection{

	public $cat_id;
	public $cat_name;
    public $cat_desc;
    public $cat_image;


	
	
	

	public function create(){
		$query = "INSERT INTO category(cat_name,cat_desc,cat_image)
				 VALUES('$this->cat_name','$this->cat_desc','$this->cat_image')";
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM category";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM category WHERE cat_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
        if(empty($this->cat_image)){	   	
		    $query = " UPDATE category SET  cat_name          = '$this->cat_name',
								            cat_desc          = '$this->cat_desc'
                                            WHERE cat_id        = $id";	
        }else{
            $query = " UPDATE category SET  cat_name         = '$this->cat_name',
                                            cat_desc         = '$this->cat_desc',
                                            cat_image        = '$this->cat_image' 
                                            WHERE cat_id     = $id";	

        }							          

        $this->performQuery($query);

    }
    
	public function delete($id){

        $query = "DELETE FROM category WHERE cat_id =$id";
        
        $this->performQuery($query);
        
	
	}
	public function login($email,$pass)
    {
        $query="select * from student
                where student_email='$email' AND student_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
}

//------------------Category Class-----------------------

//------------------Products Class-----------------------
class products extends dbconnection{

	public $pro_id;
	public $pro_name;
    public $pro_desc;
    public $pro_price;
    public $cat_image;
	public $cat_id;
	public $ven_id;




	
	
	

	public function create(){
		if(empty($this->ven_id)){
		$query = "INSERT INTO products(pro_name,pro_desc,pro_price,pro_image,cat_id,ven_id)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_price','$this->pro_image','$this->cat_id','Admin')";
		}else{
			$query = "INSERT INTO products(pro_name,pro_desc,pro_price,pro_image,cat_id,ven_id)
			VALUES('$this->pro_name','$this->pro_desc','$this->pro_price','$this->pro_image','$this->cat_id','$this->ven_id')";
		}
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM products";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM products WHERE pro_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
    }
    
	public function update($id){
        if(empty($this->pro_image)){	   	
		    $query = " UPDATE products SET  pro_name          = '$this->pro_name',
								            pro_desc          = '$this->pro_desc',
                                            pro_price         = '$this->pro_price',
								            cat_id            = '$this->cat_id'
                                            WHERE pro_id      = $id";	
        }else{
            $query = " UPDATE products SET  pro_name          = '$this->pro_name',
                                            pro_desc          = '$this->pro_desc',
                                            pro_price         = '$this->pro_price',
                                            pro_image         = '$this->pro_image',
                                            cat_id            = '$this->cat_id'
                                            WHERE pro_id      = $id";	
        }							          

        $this->performQuery($query);

    }
    
	public function delete($id){

        $query = "DELETE FROM products WHERE pro_id =$id";
        
        $this->performQuery($query);
        
	
	}
	public function login($email,$pass)
    {
        $query="select * from student
                where student_email='$email' AND student_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
}

//------------------Products Class-----------------------






?>
