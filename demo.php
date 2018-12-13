<?php


require_once __DIR__ . "/SmsSingleSender.php";
require_once __DIR__ . "/SmsSenderUtil.php";



// 短信应用SDK AppID
$appid ='xxx' ; // 1400开头

// 短信应用SDK AppKey
$appkey = "xxx";


// 需要发送短信的手机号码
$phoneNumbers = ["xxx"];

// 短信模板ID，需要在短信应用中申请
$templateId = 243980;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请


// 签名
$smsSign = "XX优品"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`




// 指定模板ID单发短信
try {
    //实现短信对象 传入appid  key
    $ssender = new SmsSingleSender($appid, $appkey);

    //短信参数 模板参数列表，如模板 {1}...{2}...{3}，那么需要带三个参数
    $params = ["5678", '5'];

    //执行请求
    //sendWithParam 方法参数
    /**
     * 指定模板单发
     *
     * @param string $nationCode 国家码，如 86 为中国
     * @param string $phoneNumber 不带国家码的手机号
     * @param int $templId 模板 id
     * @param array $params 模板参数列表，如模板 {1}...{2}...{3}，那么需要带三个参数
     * @param string $sign 签名，如果填空串，系统会使用默认签名
     * @param string $extend 扩展码，可填空串
     * @param string $ext 服务端原样返回的参数，可填空串
     * @return string 应答json字符串，详细内容参见腾讯云协议文档
     */


    // 签名参数未提供或者为空时，会使用默认签名发送短信
    $result = $ssender->sendWithParam("86", $phoneNumbers[0], $templateId, $params, $smsSign, "", "");

    $rsp = json_decode($result);
    //输出请求结果
    echo $result;
} catch (\Exception $e) {
    //抛出错误
    echo var_dump($e);
}

