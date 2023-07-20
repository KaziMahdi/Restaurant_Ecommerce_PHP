<?php 
include("views/layouts/checkout/checkout_header_library.php");
?>

<?php
include("views/layouts/common/site_menu.php");
?>

<div style="height: 200px; width:100%">

</div>
<style>
    .first {
        display: flex;
        gap: 30px;
    }

    form {
        padding: 10px 10px 10px 70px;

    }

    .button {
        width: 80%;
        background-color: black;
        color: #FFF;
    }

    .button:hover {
        background-color: #ffc107;
        color: black;
    }

    .email {
        width: 80%;
    }

    .twin {
        display: flex;
        margin-left: 80px;
    }
</style>

<?php
if (isset($_POST["btnregister"])) {
    $first_name = $_POST["fistName"];
    $last_name = $_POST["lastName"];
    $name = $first_name ." ". $last_name;
    $email = $_POST["txtEmail"];
    $mobile=$_POST["mobile"];
    $street_address=$_POST["txtaddress"];
    $post_code=$_POST["postcode"];
    $apartment=$_POST["apartment"];
    $password = $_POST["pass"];
    $repassword = $_POST["repass"];

    if ($password == $repassword) {
        $customer = new Customer;
        $customer->name = $name;
        $customer->email = $email;
        $customer->password = $password;
        $customer->country_id=1;
		$customer->street_address=$street_address;
		$customer->city="Dhaka";
		$customer->postcode=$post_code;
		$customer->apartment=$apartment;
        $customer->mobile=$mobile;
        
        $id = $customer->save();
        if ($id != null) {
            echo "Success";
        }
    } else {
        echo "Information Wrong";
    }
}

?>

<?php
if(isset($_POST["btnlogin"])){

    $username=$_POST["txtEmail"];
    $password=$_POST["pawpassword"];
    $customer=Customer::take($username,$password);

    if(isset($customer->id)){
        $_SESSION["s_name"]=$customer->name;
        $_SESSION["s_id"]=$customer->id;

        $names=explode(' ',$customer->name);

        $_SESSION["s_first_name"]=$names[0];

        $second_name=isset($names[1])?$names[1]:'';
        $_SESSION["s_last_name"]=$second_name;
            
        $_SESSION["s_mobile"]=$customer->mobile;
        $_SESSION["s_email"]=$customer->email;
        $_SESSION["s_city"]=$customer->city;
        $_SESSION["s_postcode"]=$customer->postcode;
        $_SESSION["s_street_address"]=$customer->street_address;
        $_SESSION["s_apartment"]=$customer->apartment;
        $_SESSION["s_country_id"]=$customer->country_id;

       
    }else{
        echo "Failed to login";
    }
}

?>

<div class="twin">

    <fieldset style="width:50%; margin-left:30px; border:1px solid; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding-top:20px">
        <h3 style="text-align: center;">Registration Form</h3>
        <form action="#" method="post">
            <div class="first">
                <div>
                    <label>First Name</label><br>
                    <input type="text" placeholder="First Name" name="fistName">
                </div>
                <div>
                    <label>Last Name</label><br>
                    <input type="text" placeholder="Last Name" name="lastName" style="padding-right:5%;">
                </div>
            </div>

            <div>
                <label>Email Address</label><br>
                <input type="text" placeholder="Email Address" class="email" name="txtEmail">
            </div>

            <div class="first">
                <div>
                    <label>Mobile</label><br>
                    <input type="text" placeholder="Mobile" name="mobile">
                </div>
                <div>
                    <label>Street Address</label><br>
                    <textarea name="txtaddress"></textarea> 
                </div>

            </div>
            <div class="first">
                <div>
                    <label>Post Code</label><br>
                    <input type="text" placeholder="Post Code" name="postcode">
                </div>
                <div>
                    <label>Apartment</label><br>
                    <input type="text" placeholder="Apartment" name="apartment">
                </div>

            </div>
            

            <div class="first" style="padding-bottom: 20px;">
                <div>
                    <label>Password</label><br>
                    <input type="password" placeholder="Password" name="pass">
                </div>
                <div>
                    <label>Confirm Password</label><br>
                    <input type="password" placeholder="Confirm Password" name="repass">
                </div>
            </div>

            <div>
                <input type="submit" value="REGISTER" class="button" name="btnregister">
            </div>
        </form>
    </fieldset>

    <fieldset style="width:40%; margin-left:30px; border:1px solid; border-radius:10px;padding-top:20px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <h3 style="text-align: center;">Login Form</h3>
        <form action="#" method="post">

            <div>
                <label>Email/Mobile/Id</label><br>
                <input type="text" placeholder="Email/Mobile/Id" class="email" name="txtEmail">
            </div>
            <div>
                <label>Password</label><br>
                <input type="password" placeholder="Password" class="email" name="pawpassword">
            </div>


            <div style="padding-bottom: 20px;">
                <input type="checkbox">Remember Me <span style="float: right;">Forgotten Password?</span>
            </div>
            <div>
                <input type="submit" value="LOGIN" class="button" name="btnlogin">
            </div>
        </form>
    </fieldset>
</div>

<div style="height: 200px; width:100%">

</div>
<?php
include("views/layouts/common/site_footer.php");
?>
<?php
include("views/layouts/checkout/checkout_footer_library.php");
?>