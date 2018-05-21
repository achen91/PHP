$(document).ready(function() {
				$('#settingsform').bootstrapValidator({
					fields: {
						primary_contact: {
							validators: {
								regexp: {
									regexp: /^[0-9\.]+$/,
									message: 'The input is not a valid number'
								},
								stringLength: {
			                        max: 11,
			                        message: '电话号码不能超过11位'
			                    }
							}
						}
					}
				});
			});