<?php

namespace App\Exports;

use App\Vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VehicleExport implements FromCollection,WithHeadings,ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicle::select(['agreement_no','prod_n','region_area','office','branch','customer_name','cycle','paymode','emi','tet','noi','allocation_month_grp','tenor_over','charges','gv','model','regd_num','chasis_num','engine_num','make','rrm_name_no','rrm_mail_id','coordinator_mail_id','letter_refernce','dispatch_date','letter_date','valid_date','finance_company_name'])->get();
    }

    public function headings(): array
    {
        
        return [
        	"AGREEMENT NO",
            "PROD N",
            "REGION",
            "AREA OFFICE",
            "BRANCH",
            "CUSTOMERNAME",
            "CYCLE",
            "PAYMODE",
            "EMI",
            "TET",
            "NOI",
            "ALLOCATION MONTH GRP",
            "TENOR OVER",
            "CHARGES",
            "Gv",
            "MODEL",
            "REGD NUM",
            "CHASIS NUM",
            "ENGINE NUM",
            "MAKE",
            "RRM/NAME & NO",
            "RRM MAIL ID",
            "COORDINATOR MAIL ID TO SEND DOCS",
            "Letter Refernce",
            "Dispatch Date",
            "LETTER DATE",
            "VALID DATE",
            "Finance Company Name",
        	
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true)->setSize(14);
            },
        ];
    }
}

