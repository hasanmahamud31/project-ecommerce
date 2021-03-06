<?php

use Illuminate\Database\Seeder;

class AdminAppSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $admin1 = App\Model\Admin\AdminModel::create(array('name' => 'admin', 'mobile' => '01811911911'));
        $admin2 = App\Model\Admin\AdminModel::create(array('name' => 'admin2', 'mobile' => '01811911912'));
        $admin3 = App\Model\Admin\AdminModel::create(array('name' => 'admin3', 'mobile' => '01811911913'));
        $this->command->info('admin are alive');

        $staff1 = App\Model\Admin\StaffModel::create(array('admin_id' => $admin1->id, 'name' => 'staff', 'mobile' => '01558985005', 'NID' => '12345678921211', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address1', 'staff_joining_date' => '', 'status' => '1'));
        $staff2 = App\Model\Admin\StaffModel::create(array('admin_id' => $admin2->id, 'name' => 'staff2', 'mobile' => '01558985006', 'NID' => '1234567899212', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address2', 'staff_joining_date' => '', 'status' => '1'));
        $staff3 = App\Model\Admin\StaffModel::create(array('admin_id' => $admin3->id, 'name' => 'staff3', 'mobile' => '01558985007', 'NID' => '1234567898765', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address3', 'staff_joining_date' => '', 'status' => '1'));

        $reseller1 = App\Model\Admin\ResellerModel::create(array('admin_id' => $admin1->id, 'name' => 'Reseller', 'mobile' => '015858985005', 'NID' => '123465678921211', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address1', 'reseller_joining_date' => '', 'status' => '1'));
        $reseller2 = App\Model\Admin\ResellerModel::create(array('admin_id' => $admin2->id, 'name' => 'Reseller2', 'mobile' => '01558985006', 'NID' => '1234567899212', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address2', 'reseller_joining_date' => '', 'status' => '1'));
        $reseller3 = App\Model\Admin\ResellerModel::create(array('admin_id' => $admin3->id, 'name' => 'Reseller3', 'mobile' => '01558985007', 'NID' => '1234567898765', 'present_address' => 'present_address', 'permanent_address' => 'permanent_address3', 'reseller_joining_date' => '', 'status' => '1'));

        $this->command->info('staff are alive');

        $user1 = App\Model\Admin\UserModel::create(array('admin_id' => $admin1->id, 'name' => 'user', 'mobile' => '01811911911', 'present_address' => 'user address one'));
        $user2 = App\Model\Admin\UserModel::create(array('admin_id' => $admin2->id, 'name' => 'user2', 'mobile' => '01811911912', 'present_address' => 'user address two'));
        $user3 = App\Model\Admin\UserModel::create(array('admin_id' => $admin3->id, 'name' => 'user3', 'mobile' => '01811911913', 'present_address' => 'user address three'));
        $this->command->info('user are alive');

        App\User::create(['user_id' => $admin1->id, 'email' => 'admin@admin.com', 'password' => bcrypt('123456'), 'admin_access_level' => '12']);
        App\User::create(['user_id' => $admin2->id, 'email' => 'admin2@admin.com', 'password' => bcrypt('123456'), 'admin_access_level' => '12']);
        App\User::create(['user_id' => $admin3->id, 'email' => 'admin3@admin.com', 'password' => bcrypt('123456'), 'admin_access_level' => '12']);
        $this->command->info('login admin data inserted');

        App\User::create(['user_id' => $staff1->id, 'email' => 'staff@staff.com', 'password' => bcrypt('123456'), 'admin_access_level' => '21']);
        App\User::create(['user_id' => $staff2->id, 'email' => 'staff2@staff.com', 'password' => bcrypt('123456'), 'admin_access_level' => '21']);
        App\User::create(['user_id' => $staff3->id, 'email' => 'staff3@staff.com', 'password' => bcrypt('123456'), 'admin_access_level' => '21']);
        $this->command->info('login staff data inderted');

        App\User::create(['user_id' => $reseller1->id, 'email' => 'rseller@reseller.com', 'password' => bcrypt('123456'), 'admin_access_level' => '13']);
        App\User::create(['user_id' => $reseller2->id, 'email' => 'reseller2@reseller.com', 'password' => bcrypt('123456'), 'admin_access_level' => '13']);
        App\User::create(['user_id' => $reseller3->id, 'email' => 'reseller3@reseller.com', 'password' => bcrypt('123456'), 'admin_access_level' => '13']);
        $this->command->info('login Reseller data inderted');

        App\User::create(['user_id' => $user1->id, 'email' => 'user@user.com', 'password' => bcrypt('123456'), 'admin_access_level' => '99']);
        App\User::create(['user_id' => $user2->id, 'email' => 'user2@user.com', 'password' => bcrypt('123456'), 'admin_access_level' => '99']);
        App\User::create(['user_id' => $user3->id, 'email' => 'user3@user.com', 'password' => bcrypt('123456'), 'admin_access_level' => '99']);
        $this->command->info('user data inserted');

        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'All Categories', 'value' => '0', 'status' => '1'));
        $mobile = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Cell Phones &amp; Accessories', 'value' => '15032', 'status' => '1'));
        $camera = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Cameras &amp; Photo', 'value' => '625', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Antiques', 'value' => '20081', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Art', 'value' => '550', 'status' => '1'));
        //App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Baby', 'value' => '2984', 'status' => '1'));
        //$books = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Books', 'value' => '267', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Business &amp; Industrial', 'value' => '12576', 'status' => '1'));
        $clothing_cat = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Clothing, Shoes &amp; Accessories', 'value' => '11450', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Coins &amp; Paper Money', 'value' => '11116', 'status' => '1'));
        //$computer = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Computers/Tablets &amp; Networking', 'value' => '58058', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Consumer Electronics', 'value' => '293', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Crafts', 'value' => '14339', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Dolls &amp; Bears', 'value' => '237', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'DVDs &amp; Movies', 'value' => '11232', 'status' => '1'));
        //App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Gift Cards &amp; Coupons', 'value' => '172008', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Health &amp; Beauty', 'value' => '26395', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Home &amp; Garden', 'value' => '11700', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Jewelry &amp; Watches', 'value' => '281', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Musical Instruments &amp; Gear', 'value' => '619', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Music', 'value' => '11233', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Pet Supplies', 'value' => '1281', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Pottery &amp; Glass', 'value' => '870', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Real Estate', 'value' => '10542', 'status' => '1'));
        //App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Specialty Services', 'value' => '316', 'status' => '1'));
        //$sports = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Sporting Goods', 'value' => '888', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Sports Mem, Cards &amp; Fan Shop', 'value' => '64482', 'status' => '1'));
        //App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Stamps', 'value' => '260', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Tickets &amp; Experiences', 'value' => '1305', 'status' => '1'));
       // $toys = App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Toys &amp; Hobbies', 'value' => '220', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Travel', 'value' => '3252', 'status' => '1'));
        // App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Video Games &amp; Consoles', 'value' => '1249', 'status' => '1'));
        //App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Everything Else', 'value' => '99', 'status' => '1'));
        $this->command->info('category inserted');


        $subcategory_idMobile = App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id, 'category_id' => $mobile->id, 'sub_name' => 'Mobile', 'value' => '101', 'status' => '1'));
        $subcategory_idMobileAcc = App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id, 'category_id' => $mobile->id, 'sub_name' => 'Mobile Accessories', 'value' => '102', 'status' => '1'));
        $subcategory_idCamera=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'sub_name' => 'Camera','value' => '201', 'status' => '1'));
        $subcategory_idCameraAccessories=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'sub_name' => 'Camera Accessories','value' => '202', 'status' => '1'));
        
       $clothing_subcatPants=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $clothing_cat->id, 'sub_name' => 'Pants', 'value' => '301', 'status' => '1'));
       $clothing_subcatShoes=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $clothing_cat->id, 'sub_name' => 'Shoes', 'value' => '302', 'status' => '1'));
//        $subcategory_idcamera=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'sub_name' => 'Sony', 'value' => '1305', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'sub_name' => 'Canon', 'value' => '220', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'sub_name' => 'HTL', 'value' => '3252', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'sub_name' => 'Toshiba', 'value' => '1249', 'status' => '1'));
//        $subcategory_idcomputer=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'sub_name' => 'HP', 'value' => '99', 'status' => '1'));
//        
//        $books_sub=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $books->id, 'sub_name' => 'Programming language', 'value' => '1014', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $books->id, 'sub_name' => 'play','value' => '2014', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $books->id, 'sub_name' => 'Drama', 'value' => '3013', 'status' => '1'));
//        $sports_sub=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $sports->id, 'sub_name' => 'Cricket', 'value' => '1345', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $sports->id, 'sub_name' => 'Football', 'value' => '2205', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $sports->id, 'sub_name' => 'ha do do', 'value' => '32452', 'status' => '1'));
//        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $toys->id,'sub_name' => 'Rubik Cube', 'value' => '12249', 'status' => '1'));
//        $toys_sub=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $toys->id,'sub_name' => 'Toy train', 'value' => '995', 'status' => '1'));
        $this->command->info('Sub category inserted');

        $product_oneWalton1 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '101', 'product_name' => 'primo EF3', 'brand_name' => 'Walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '6390', 'status' => '1'));
        $product_twoWalton2 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '201', 'product_name' => 'primo RM2', 'brand_name' => 'walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '10890', 'status' => '1'));
        $product_3_samsung = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '301', 'product_name' => 'Samsung Galaxy S2', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '2 m,4500', 'status' => '1'));
        $product_4samsung2 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '1305', 'product_name' => 'Samsung Galaxy S3', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '24000  ', 'status' => '1'));
        $product_5apple1 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '220', 'product_name' => 'Iphone 6', 'brand_name' => 'apple', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4143', 'status' => '1'));
        $product_6apple2 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobile->id, 'sku' => '3252', 'product_name' => 'Iphone 6+', 'brand_name' => 'apphle', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '134', 'status' => '1'));
        $product_7MobAcce1 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobileAcc->id, 'sku' => '1249', 'product_name' => 'Power Bank', 'brand_name' => 'Chines', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '1343', 'status' => '1'));
        $product_8MobAcce2 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id, 'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idMobileAcc->id, 'sku' => '99', 'product_name' => 'Apple Power Bank', 'brand_name' => 'Apple', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '14354', 'status' => '1'));

        $product_Camera1 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idCamera->id, 'sku' => '101','product_name' => 'Samsung NX500', 'brand_name' => 'Samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
        $product_Camera2 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idCamera->id,'sku' => '201','product_name' => 'Samsung WB2200F', 'brand_name' => 'Samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
        //$product_Camera3 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idCamera->id, 'sku' => '301', 'product_name' => 'Sony Alpha 7R II', 'brand_name' => 'Sony', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3214', 'status' => '1'));
        $product_8CamAcce1 = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idCameraAccessories->id, 'sku' => '1305', 'product_name' => 'Camera Lence', 'brand_name' => 'Sony', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4331', 'status' => '1'));
        $product_clothing = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $clothing_cat->id, 'subcategory_id' => $clothing_subcatPants->id, 'sku' => '1305', 'product_name' => 'Pants', 'brand_name' => 'Bangladesh', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '800', 'status' => '1'));
        $product_shoes = App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $clothing_cat->id, 'subcategory_id' => $clothing_subcatShoes->id, 'sku' => '1305', 'product_name' => 'Camera Lence', 'brand_name' => 'Sony', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4331', 'status' => '1'));
//        App\Model\Admi\][POIYTRQ`123570n\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idcamera->id, 'sku' => '220', 'product_name' => 'Iphone 6', 'brand_name' => 'apple', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4143', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idcamera->id, 'sku' => '3252', 'product_name' => 'Iphone 6.5', 'brand_name' => 'apphle', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '134', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $subcategory_idcomputer->id, 'sku' => '1249', 'product_name' => 'Hp -smart phone 1', 'brand_name' => 'hp', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '1343', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $subcategory_idcomputer->id, 'sku' => '99', 'product_name' => 'LG smart phone 7', 'brand_name' => 'lg', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '143', 'status' => '1'));
//        
//        $product_one=App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $mobile->id, 'subcategory_id' => $books_sub->id, 'sku' => '101','product_name' => '3 goyenda', 'brand_name' => 'Walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
//        $product_two=App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'subcategory_id' => $books_sub->id,'sku' => '201','product_name' => 'himo is back', 'brand_name' => 'walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
//        $product_three=App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'subcategory_id' => $books_sub->id, 'sku' => '301', 'product_name' => 'science fiction', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3214', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'subcategory_id' => $sports_sub->id, 'sku' => '1305', 'product_name' => 'cricket', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4331', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $toys_sub->id, 'sku' => '220', 'product_name' => 'rubic cube', 'brand_name' => 'apple', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4143', 'status' => '1'));
//        ';lkj ASDFGHJKL']
//        \
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $toys_sub->id, 'sku' => '3252', 'product_name' => 'doreamon', 'brand_name' => 'apphle', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '134', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $toys_sub->id, 'sku' => '1249', 'product_name' => 'Drone', 'brand_name' => 'hp', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '1343', 'status' => '1'));
//        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $toys_sub->id, 'sku' => '99', 'product_name' => 'wireless car', 'brand_name' => 'lg', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '143', 'status' => '1'));
        $this->command->info('product inserted');



        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_oneWalton1->id, 'image_path' => 'product_images/1.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_oneWalton1->id, 'image_path' => 'product_images/2.png', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_oneWalton1->id, 'image_path' => 'product_images/3.png', 'status' => '1'));
         $this->command->info('product walton image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_twoWalton2->id, 'image_path' => 'product_images/4.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_twoWalton2->id, 'image_path' => 'product_images/5.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_twoWalton2->id, 'image_path' => 'product_images/6.jpg', 'status' => '1'));
         $this->command->info('product walton 2 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_3_samsung->id, 'image_path' => 'product_images/7.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_3_samsung->id, 'image_path' => 'product_images/8.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_3_samsung->id, 'image_path' => 'product_images/9.jpg', 'status' => '1'));
         $this->command->info('product samsung s2 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_4samsung2->id, 'image_path' => 'product_images/10.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_4samsung2->id, 'image_path' => 'product_images/11.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_4samsung2->id, 'image_path' => 'product_images/12.jpg', 'status' => '1'));
         $this->command->info('product samsung s3 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/13.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/14.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/15.jpg', 'status' => '1'));
         $this->command->info('product Apple1 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_6apple2->id, 'image_path' => 'product_images/16.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_6apple2->id, 'image_path' => 'product_images/17.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_6apple2->id, 'image_path' => 'product_images/18.jpg', 'status' => '1'));
         $this->command->info('product Apple2 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_7MobAcce1->id, 'image_path' => 'product_images/19.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_7MobAcce1->id, 'image_path' => 'product_images/20.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_7MobAcce1->id, 'image_path' => 'product_images/21.jpg', 'status' => '1'));
         $this->command->info('product mobile accessories 1 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8MobAcce2->id, 'image_path' => 'product_images/22.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8MobAcce2->id, 'image_path' => 'product_images/23.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8MobAcce2->id, 'image_path' => 'product_images/24.jpg', 'status' => '1'));
         $this->command->info('product moboile accessories 2 image insert .......');
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/25.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/25.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_5apple1->id, 'image_path' => 'product_images/27.jpg', 'status' => '1'));
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera1->id, 'image_path' => 'product_images/28.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera1->id, 'image_path' => 'product_images/29.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera1->id, 'image_path' => 'product_images/30.jpg', 'status' => '1'));
        $this->command->info('product camera 1 image insert .......');
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera2->id, 'image_path' => 'product_images/31.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera2->id, 'image_path' => 'product_images/32.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_Camera2->id, 'image_path' => 'product_images/33.jpg', 'status' => '1'));
        $this->command->info('product camera 2 image insert .......');
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8CamAcce1->id, 'image_path' => 'product_images/34.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8CamAcce1->id, 'image_path' => 'product_images/35.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_8CamAcce1->id, 'image_path' => 'product_images/36.jpg', 'status' => '1'));
        $this->command->info('product camera 3 image insert .......');
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $subcategory_idCameraAccessories->id, 'image_path' => 'product_images/37.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $subcategory_idCameraAccessories->id, 'image_path' => 'product_images/38.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $subcategory_idCameraAccessories->id, 'image_path' => 'product_images/39.jpg', 'status' => '1'));
        $this->command->info('product product_8CamAcce1 image insert .......');
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_clothing->id, 'image_path' => 'product_images/37.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_clothing->id, 'image_path' => 'product_images/38.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_clothing->id, 'image_path' => 'product_images/39.jpg', 'status' => '1'));
        $this->command->info('product pants image insert .......');
        
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_shoes->id, 'image_path' => 'product_images/37.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_shoes->id, 'image_path' => 'product_images/38.jpg', 'status' => '1'));
        App\Model\Admin\ProdcutImageModel::create(array('product_id' => $product_shoes->id, 'image_path' => 'product_images/39.jpg', 'status' => '1'));
        $this->command->info('product shoes image insert .......');
        
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '28', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '29', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '30', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '31', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '32', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '33', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_clothing->id, 'size_name' => '34', 'status' => '1'));
        $this->command->info('product pants size insert .......');
        
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '39', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '40', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '41', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '42', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '43', 'status' => '1'));
        App\Model\Admin\ProductSizeModel::create(array('product_id' => $product_shoes->id, 'size_name' => '44', 'status' => '1'));
        $this->command->info('product shoes size insert .......');

        App\Model\Admin\OrderModel::create(array('user_id' => 1, 'product_id' => $product_oneWalton1->id, 'product_quantity' => '1', 'prodcut_price' => $product_oneWalton1->product_price, 'product_total_price' => 1 * $product_oneWalton1->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 1, 'product_id' => $product_twoWalton2->id, 'product_quantity' => '1', 'prodcut_price' => $product_twoWalton2->product_price, 'product_total_price' => 1 * $product_twoWalton2->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 1, 'product_id' => $product_3_samsung->id, 'product_quantity' => '2', 'prodcut_price' => $product_3_samsung->product_price, 'product_total_price' => 2 * $product_3_samsung->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 1, 'product_id' => $product_4samsung2->id, 'product_quantity' => '2', 'prodcut_price' => $product_4samsung2->product_price, 'product_total_price' => 2 * $product_4samsung2->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 3, 'product_id' => $product_5apple1->id, 'product_quantity' => '2', 'prodcut_price' => $product_5apple1->product_price, 'product_total_price' => 2 * $product_5apple1->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 2, 'product_id' => $product_8MobAcce2->id, 'product_quantity' => '2', 'prodcut_price' => $product_8MobAcce2->product_price, 'product_total_price' => 2 * $product_8MobAcce2->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 2, 'product_id' => $product_twoWalton2->id, 'product_quantity' => '1', 'prodcut_price' => $product_twoWalton2->product_price, 'product_total_price' => 1 * $product_twoWalton2->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        App\Model\Admin\OrderModel::create(array('user_id' => 2, 'product_id' => $product_twoWalton2->id, 'product_quantity' => '1', 'prodcut_price' => $product_twoWalton2->product_price, 'product_total_price' => 1 * $product_twoWalton2->product_price, 'product_discount' => '1', 'delivery_address_one' => 'delivery_address_one', 'delivery_address_two' => 'delivery_address_two', 'status' => '1'));
        $this->command->info('Order insert .......');
    }

}
