<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 1:19
 */
$q=isset($_POST["q"])?$_POST["q"]:'';
if(is_array($q))
{
    //注意（）和，
    $sites=array(
        'basketball' => 'You like basketball',
    'football' =>'you like football',
     'table_tennis' => 'You like table tennis',
     'swimming'  => 'You like swimming');
}
?>
<form action="" methon="post">
    <select multiple="multiple" name="q[]">
        <option value="">please select your favorite</option>
        <option value="basketall">basketall</option>
        <option value="football">footall</option>
        <option value="tabbel_tennis">table tennis</option>
        <option value="swimming">swimming</option>
    </select>
</form>