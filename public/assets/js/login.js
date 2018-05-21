$(document).ready(function() {
				$('#loginform').bootstrapValidator({
					fields: {
						email: {
							validators: {
								notEmpty: {
									message: '邮箱地址不能为空'
								},
								emailAddress: {
									message: '输入不是有效邮箱地址'
								}
							}
						},
						 password: {
            				validators: {
            					notEmpty: {
									message: '请输入密码'
								},
           					 }
       					 },
					}
			});
			});