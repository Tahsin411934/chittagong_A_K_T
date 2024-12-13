<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    use HasFactory;

    // Define the table name (if it doesn't follow Laravel's naming convention)
    protected $table = 'Bank_Info';

    // Define the primary key (if it isn't 'id')
    protected $primaryKey = 'Bank_Acc_Id';

    // Disable auto-increment if the primary key isn't an integer
    public $incrementing = false;

    // Define the key type
    protected $keyType = 'string';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'Bank_Name',
        'Branch_Name',
        'Acc_No',
        'Acc_Type',
        'Opening_Year',
        'Duration',
        'Active',
        'Opening_Amount',
        'Current_Amount',
    ];

    // Disable timestamps if not using created_at and updated_at columns
    public $timestamps = false;
}
