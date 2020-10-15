<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table="vehicles";

    protected $fillable = ['agreement_no','prod_n','region_area','office','branch','customer_name','cycle','paymode','emi','tet','noi','allocation_month_grp','tenor_over','charges','gv','model','regd_num','chasis_num','engine_num','make','rrm_name_no','rrm_mail_id','coordinator_mail_id','letter_refernce','dispatch_date','letter_date','valid_date','create_type','deleted','finance_company_name'];
    
}
