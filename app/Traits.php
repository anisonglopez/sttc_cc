<?php
namespace App;
use App\Log;
use App\UserInRole;
use Auth;
use App\M_Stock;
use Illuminate\Http\Request;

trait Traits {
    public function saveLog($status, $func, $action, $desc )
    {
        $text = var_export($desc, true);
        $text = trim($text , "'" );
        // echo $text;
        $email = Auth::user() ? Auth::user()->email : 'USER_NULL';
        try{
            $smtp = new Log(
            [  
                'action' => $func,
                'module' =>$action['controller'],
                'user' => $email,
                'page' =>  $action['as'],
                'desc' =>  $text,
                'status' =>$status,
            ]);
            $smtp -> save();
            // return $status. $func. $action. $desc;
            }catch (\Exception $e) {
                return 'error ' . $e->getMessage();
            }
    }
    public function getBranchId()
    {
        $user_id = Auth::user() ? Auth::user()->id : '';
        try{
                $stmt2 = UserInRole::Query()
                ->select('branches.id')
                ->Join('roles', 'user_in_roles.role_id', '=', 'roles.id')
                ->Join('branches', 'roles.branch_id', '=', 'branches.id')
                ->where('user_in_roles.user_id', $user_id )
                ->distinct()
                ->get();
                $branch_id = '';
                foreach ($stmt2 as $row) :
                    $branch_id = $branch_id . ' ' . $row->id . ' or ';
                endforeach;
                $branch_id  = rtrim($branch_id, ' or ');
                return $branch_id;
            }catch (\Exception $e) {
                return 'error ' . $e->getMessage();
            }
    }
    public function StockTransaction($m_id, $qty, $operator)
    {
        $stmt_check = M_Stock::all()->where('m_id', $m_id)->first();
        $qty_balance = $stmt_check['qty_balance'] == null ? 0 : $stmt_check['qty_balance'];
        switch ($operator){
            case "+" :
            $qty_total = intval($qty + $qty_balance);
            break;
            case "-" :
            $qty_total = abs($qty - $qty_balance);
            break;
        }
        try{
                $smtp = M_Stock::updateOrCreate(
                [
                    'm_id' => $m_id],[
                    'm_id' => $m_id,
                    'qty_balance' => $qty_total,
                ]);
                $smtp -> save();            
                return "ok";
            }catch (\Exception $e) {
                return 'error ' . $e->getMessage();
            }
    }

}