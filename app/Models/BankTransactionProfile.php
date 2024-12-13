<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransactionProfile extends Model
{
    use HasFactory;

    // টেবিলের নাম যদি মডেল নামের সাথে না মিলে, তবে এখানে সেট করতে হবে
    protected $table = 'Bank_Transaction_Profile';

    // যদি টেবিলের প্রাথমিক কী (Primary Key) 'id' না হয়, তবে সেটিও ডিফাইন করতে হবে
    protected $primaryKey = 'Bnk_Trans_Id';

    // টেবিলের কোন ফিল্ডগুলোতে mass assignment করতে পারবেন তা উল্লেখ করতে হবে
    protected $fillable = [
        'Bank_Acc_Id',
        'Cause',
        'Date_Time',
        'Year',
        'Debit',
        'Credit',
    ];

    
    public $incrementing = false;

    
    protected $keyType = 'string';

    
    public $timestamps = false;
}
