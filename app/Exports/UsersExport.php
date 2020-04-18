<?php

namespace App\Exports;

use App\Models\InternetProtocol;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection, Responsable
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'users.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::all();
        $data = new Collection();
        foreach ($users as $user) {
            $tmp = new \stdClass();
            $tmp->id = $user->id;
            $tmp->email = $user->email;
            $ips = InternetProtocol::whereIn('group_id', $user->groups()->pluck('id'))->get();
            $i = 0;
            foreach ($ips as $ip) {
                $tmp->ip_name{$i} = $ip->name;
                $tmp->ip_gateway{$i} = $ip->gateway;
                $tmp->ip_type{$i} = $ip->type;
                $tmp->ip_mikrotik_name{$i} = $ip->mikrotik->name;
                $tmp->ip_mikrotik_url{$i} = $ip->mikrotik->url;
                $i++;
            }
            $data->push($tmp);
        }
        return $data;
    }
}
