<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'User_Info';
    protected $primaryKey = 'member_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; 

    
    protected $fillable = [
        'member_id', 
        'Name', 
        'FatherName',  
        'MotherName',  
        'SpouseName',  
        'PerAddress',  
        'MailAddress',  
        'PhoneNumber',  
        'EMail',  
        'DateOfBirth',  
        'NID',  
        'Occupation',  
        'EducationalQualification',  
        'MemberOfAkhondomondoli',  
        'AddressOfAkhondomondoli',  
        'VerifiedBy',  
        'CurrentAmount',
        'image',  
        'signature'
    ];

    protected $attributes = [
        'CurrentAmount' => 0,
    ];
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('' . $this->image) : null;
    }
    // Accessor to get the signature URL
    public function getSignatureUrlAttribute()
    {
        return $this->signature ? asset('' . $this->signature) : null;
    }

}
