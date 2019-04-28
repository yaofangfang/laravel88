<?php
$return =[	
		//应用ID,您的APPID。
		'app_id' => "2016092500596215",

		//商户私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEAzdiTjH7bzODNwxfFqs9SyPACt8rqqeg7eLfJvnOw6kx6VXdqBliIp6Cxxx+MDGdmey+V1X0n3e02crqvrY8NWtdYIIOwdNVb0VEOdwO28pdT2kVGXdPkE9rPdO9DmT5Bg4ms+lFKzMc3SJOUrRcOa/6LIWiq+o9eRK2o84DDmf2Np16uGYdVLycDRCW2ypTwDL6B5XYy3AURRcYDYROG1y4/LBwu9U4ALgD3k114LuUGzCB44Jgel9QntRAue95507Z61l5SxC6TwhC6OmieJgZx0q3ea23j9os1l7TZGwF8eMaDQVvhG/XjIxL6IngcyDf/vxB/7FqfohgBRCB+nwIDAQABAoIBAQCT2I1JaMg4I/LFwCpCH7ynA/P/zCe1t04Xy3GEcBXOgvWOs0Eco7QrKbjmexscwZuSuL/WYZkjxb/IsZuCfe+qombym4M+twvGkIBiLPHW1aftaro6o/j55bwBkeQsidGGR3lNJNwjrqZfY1hy5c9+84k8iq/bXOPpUg26L27OB0tCsnqZs9Pnxi2mfZTsQThPxShyt6uu0713iT0TdHma121pX6QMHwu2z/Vn0jh/Fcu0zm6F8OLOZgT0SGslTi8l5Dgj3M7vB8K3QQCoiVNRGvOOxyYjQpg5Imj5n5rRI5A/nALWwfIywatvaSpnCdWa0fuo4Rgyas2b6WLzuDgRAoGBAPjtP+WBTjSWGomnqTpCx1JX1X1SPKcvqL6n4QK8Rcdo2MdMjJfPINJ767MqirMmo42znUubq0Xi06W5VaVCsoV0ewMhTYky5o+nRK90U2uksGW2uor767clFcjLxVwNzGr6oJPsQbspeQ0fXHpoCW0zHjAKcsnCMko/MHzIfvcHAoGBANOx8ozE5LeR5YK6aHyK0L16n01Pv12NIqfdfrtc+ojFe1BlR3/lHpk5CyUS0GLFgwJbbDPSGneAY9YW6gYDajPGUwLXpPlMJyx7D8kh6HiZ1IB5i3n4ohjT0MrxpL+66fQthQa4OiNl7ChSXM/nIuVExmnR1sXbkH+vD53zh32pAoGBANLKzWYC5n/fcF+LK+HbNMDFAlNadWQ6FpJExWU0m35uicvTRec0Dh5Ps9uHteZZXPyc0iF5lELc/s8Cr8T/Qv+CEL0o0WjSQq35Pk+5mP65emrXnwYcqJHxhI4CCIGYabdZvuskkND2ILz9BqndOcZQGEskPeoeWcnH0r6IZgO3AoGBAMaS/iUjsDOtrG9DMi3Y/NMwCew4aRZ1BFQYRf+0yOGw9OpGBpqmrlwmERk2m7h681grr8SwSdlc2smA9waq/10PpOBercaXs4ta6ETQBMPT8GyPFtFT86F8Vzd3EgYza697X3QdLZP00GBGWf8/HhGXwNKUXnV8bwAGk4yjWq35AoGBAKvLW/Ga1C7h/4md/Un5kZQzB1htIIo6iIK21Ql6BhFPfOL133FqmD5GDHJjXRIzxA6WQ+eGaUQGfSLZ4fPPYt3ieRM+a/oXzPwWSXUjvNyhyJTxbChpHh0coj3R3dL1bCs+wRLD3TgGttPOnt/ut2fagYd39qd+RTKWNbj1B4VT",
		
		//异步通知地址
		'notify_url' => "http://alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		// 'notify_url' => "http://localhost/alipay/notify",
		//同步跳转
		'return_url' => "http://alipay.trade.page.pay-PHP-UTF-8/return_url.php",
		// "http://www.plus.com/index.php/order/paySuccess",


		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzdiTjH7bzODNwxfFqs9SyPACt8rqqeg7eLfJvnOw6kx6VXdqBliIp6Cxxx+MDGdmey+V1X0n3e02crqvrY8NWtdYIIOwdNVb0VEOdwO28pdT2kVGXdPkE9rPdO9DmT5Bg4ms+lFKzMc3SJOUrRcOa/6LIWiq+o9eRK2o84DDmf2Np16uGYdVLycDRCW2ypTwDL6B5XYy3AURRcYDYROG1y4/LBwu9U4ALgD3k114LuUGzCB44Jgel9QntRAue95507Z61l5SxC6TwhC6OmieJgZx0q3ea23j9os1l7TZGwF8eMaDQVvhG/XjIxL6IngcyDf/vxB/7FqfohgBRCB+nwIDAQAB",
	];