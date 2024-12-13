<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\TransectionProfile;
class TransectionProfile extends Model
{
    use HasFactory;

    protected $table = 'Transection_Profile'; // আপনার টেবিলের নাম
    protected $primaryKey = 'Trans_ID'; // আপনার প্রাথমিক কী

    protected $fillable = [
        'Member_ID',
        'User_ID',
        'Date',
        'Debit',
        'Credit',
    ];

    public $timestamps = false;

    /**
     * প্রতিটি TransectionProfile একটি নির্দিষ্ট Member এর সাথে সম্পর্কিত
     */
    public function member()
    {
        return $this->belongsTo(member::class, 'Member_ID', 'Member_ID');
    }
}

