<?php
  use Illuminate\Support\Facades\DB;
  // print array data format
  if(!function_exists('prx')){
    function prx($result){
      echo "<pre>";
      print_r($result);

      echo "</pre>";

      die();

    }
  }

  // add money to wallet table by user id
  if(!function_exists('addMoney')){
    function addMoney($user_id, $order_id,$amt,$msg,$type){
      DB::table('wallet')->insert(
        ['user_id' => $user_id, 'razorpay_order_id' =>$order_id,'amt'=>$amt,'msg' => $msg,'type' => $type]
      );
    }
  }

  // print walletAmount by userid
  if(!function_exists('getWalletAmt')){
    function getWalletAmt($user_id){
      $res = DB::table('wallet')->where(['user_id' => $user_id])->get()->toArray();
      if(count($res) > 0){
        $in = 0;
        $out = 0;
        foreach ($res as $key => $data) {
          if($data->type === 'in'){
            $in += $data->amt;
          }

          if($data->type === 'out'){
            $out += $data->amt;
          }
        }
        return ($in - $out);
      }
    }
  }

  // wallet list history by user_id
  if(!function_exists('getWalletList')){
    function getWalletList($user_id){
      $resList = DB::table('wallet')->where(['user_id' => $user_id])->orderBy('id', 'DESC')->get()->toArray();
      return $resList;
    }
  }

  // get users details
  if(!function_exists('userDetails')){
    function userDetails($user_id){
      $resList = DB::table('users')->where(['id' => $user_id])->get()->toArray();
      return $resList;
    }
  }
?>