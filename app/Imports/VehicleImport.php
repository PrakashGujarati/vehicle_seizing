<?php

namespace App\Imports;

use App\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Validator;
use Session;

use Illuminate\Http\Request;



class VehicleImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {


            if(
                isset($row['agreement_no']) &&
                isset($row['region']) &&
                isset($row['area_office']) &&
                isset($row['branch']) &&
                isset($row['customername']) &&
                isset($row['cycle']) &&
                isset($row['paymode']) &&
                isset($row['emi']) &&
                isset($row['tet']) &&
                isset($row['noi']) &&
                isset($row['allocation_month_grp']) &&
                isset($row['tenor_over']) &&
                isset($row['charges']) &&
                isset($row['gv']) &&
                isset($row['model']) &&
                isset($row['regd_num']) &&
                isset($row['chasis_num']) &&
                isset($row['engine_num']) &&
                isset($row['make']) &&
                isset($row['rrmname_no']) &&
                isset($row['rrm_mail_id']) &&
                isset($row['coordinator_mail_id_to_send_docs']) &&
                isset($row['letter_refernce']) &&
                isset($row['dispatch_date']) &&
                isset($row['letter_date']) &&
                isset($row['valid_date']) 

            )
            {
                Session::flash('message-success', 'Vehicle Data Imported successfully..');
                
                return new Vehicle([
               'agreement_no'=> $row['agreement_no'],
               'prod_n' => $row['agreement_no'],
               'region_area'=> $row['region'],
               'office' => $row['area_office'],
               'branch' => $row['branch'],
               'customer_name' => $row['customername'],
               'cycle' => $row['cycle'],
               'paymode' => $row['paymode'],
               'emi' => $row['emi'],
               'tet' => $row['tet'],
               'noi' => $row['noi'],
               'allocation_month_grp' => $row['allocation_month_grp'],
               'tenor_over' => $row['tenor_over'],
               'charges' => $row['charges'],
               'gv' => $row['gv'],
               'model' => $row['model'],
               'regd_num' => $row['regd_num'],
               'chasis_num' => $row['chasis_num'],
               'engine_num' => $row['engine_num'],
               'make' => $row['make'],
               'rrm_name_no' => $row['rrmname_no'],
               'rrm_mail_id' => $row['rrm_mail_id'],
               'coordinator_mail_id' => $row['coordinator_mail_id_to_send_docs'],
               'letter_refernce' => $row['letter_refernce'],
               'dispatch_date' => $row['dispatch_date'],
               'letter_date' => $row['letter_date'],
               'valid_date' => $row['valid_date'],
            ]);
        }
        else
        {
              return Session::flash('message-danger', 'please use in simple excel sheet');
        }
        
    }

   
}
