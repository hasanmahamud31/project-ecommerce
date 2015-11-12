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
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Antiques', 'value' => '20081', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Art', 'value' => '550', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Baby', 'value' => '2984', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Books', 'value' => '267', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Business &amp; Industrial', 'value' => '12576', 'status' => '1'));
        $camera=App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Cameras &amp; Photo', 'value' => '625', 'status' => '1'));
        $mobile=App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Cell Phones &amp; Accessories', 'value' => '15032', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Clothing, Shoes &amp; Accessories', 'value' => '11450', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Coins &amp; Paper Money', 'value' => '11116', 'status' => '1'));
        $computer=App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Computers/Tablets &amp; Networking', 'value' => '58058', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Consumer Electronics', 'value' => '293', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Crafts', 'value' => '14339', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Dolls &amp; Bears', 'value' => '237', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'DVDs &amp; Movies', 'value' => '11232', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Gift Cards &amp; Coupons', 'value' => '172008', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Health &amp; Beauty', 'value' => '26395', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Home &amp; Garden', 'value' => '11700', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Jewelry &amp; Watches', 'value' => '281', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Musical Instruments &amp; Gear', 'value' => '619', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Music', 'value' => '11233', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Pet Supplies', 'value' => '1281', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Pottery &amp; Glass', 'value' => '870', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Real Estate', 'value' => '10542', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Specialty Services', 'value' => '316', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Sporting Goods', 'value' => '888', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Sports Mem, Cards &amp; Fan Shop', 'value' => '64482', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Stamps', 'value' => '260', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin2->id, 'name' => 'Tickets &amp; Experiences', 'value' => '1305', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Toys &amp; Hobbies', 'value' => '220', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin3->id, 'name' => 'Travel', 'value' => '3252', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Video Games &amp; Consoles', 'value' => '1249', 'status' => '1'));
        App\Model\Admin\CategoryModel::create(array('admin_id' => $admin1->id, 'name' => 'Everything Else', 'value' => '99', 'status' => '1'));
        $this->command->info('category inserted');
        
        
        $subcategory_idwalton=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $mobile->id, 'sub_name' => 'Walton', 'value' => '101', 'status' => '1'));
        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'sub_name' => 'Samsung','value' => '201', 'status' => '1'));
        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'sub_name' => 'Apple', 'value' => '301', 'status' => '1'));
        $subcategory_idcamera=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'sub_name' => 'Sony', 'value' => '1305', 'status' => '1'));
        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'sub_name' => 'Canon', 'value' => '220', 'status' => '1'));
        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'sub_name' => 'HTL', 'value' => '3252', 'status' => '1'));
        App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'sub_name' => 'Lg', 'value' => '1249', 'status' => '1'));
        $subcategory_idcomputer=App\Model\Admin\SubCategoryModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'sub_name' => 'HP', 'value' => '99', 'status' => '1'));
        $this->command->info('Sub category inserted');
        
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idwalton->id, 'sku' => '101','product_name' => 'primo EF3', 'brand_name' => 'Walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idwalton->id,'sku' => '201','product_name' => 'primo EF9', 'brand_name' => 'walton', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3414', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $mobile->id, 'subcategory_id' => $subcategory_idwalton->id, 'sku' => '301', 'product_name' => 'primo EF8', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '3214', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin2->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idcamera->id, 'sku' => '1305', 'product_name' => 'primo EF7', 'brand_name' => 'samsung', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4331', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idcamera->id, 'sku' => '220', 'product_name' => 'primo EF6', 'brand_name' => 'apple', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '4143', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin3->id,'category_id' => $camera->id, 'subcategory_id' => $subcategory_idcamera->id, 'sku' => '3252', 'product_name' => 'primo EF5', 'brand_name' => 'apphle', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '134', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $subcategory_idcomputer->id, 'sku' => '1249', 'product_name' => 'primo EF1', 'brand_name' => 'hp', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '1343', 'status' => '1'));
        App\Model\Admin\ProductModel::create(array('admin_id' => $admin1->id,'category_id' => $computer->id,'subcategory_id' => $subcategory_idcomputer->id, 'sku' => '99', 'product_name' => 'primo EF2', 'brand_name' => 'lg', 'product_quantity' => '1', 'product_description' => 'product_description', 'product_price' => '143', 'status' => '1'));
        $this->command->info('product inserted');
    }

}
