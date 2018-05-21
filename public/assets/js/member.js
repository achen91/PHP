var startDateValidators = {
			            row: '.plan-start-date',
			            validators: {
			                notEmpty: {
			                    message: '请填写开始时间'
			                }
			            }
			        };

	$('#membersform').bootstrapValidator({
		fields: {
			member_code: {
				validators: {
					notEmpty: {
						message: '请填写会员编号'
					}
				}
			},
			name: {
				validators: {
					notEmpty: {
						message: '请填写会员姓名'
					},
					stringLength: {
                        max: 50,
                        message: '会员姓名不能超过25字'
                    }
				}
			},
			address: {
				validators: {
					notEmpty: {
						message: '请填写会籍记录'
					},
					stringLength: {
                        max: 200,
                        message: '会籍不能超过100字'
                    }
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: '请填写电子邮箱'
					},
					emailAddress: {
						message: '电子邮箱无效'
					},
					stringLength: {
                        max: 50,
                        message: '邮箱名称超长'
                    }
				}
			},
			DOB: {
				validators: {
					notEmpty: {
						message: '请填写生日'
					},
					date: {
                        //format: 'YYYY-MM-DD',
                        message: '日期格式:YYYY-MM-DD'
                    }
				}
			},
			status: {
				validators: {
					notEmpty: {
						message: ''
					}
				}
			},
			health_issues: {
				validators: {
					notEmpty: {
						message: '请填写状态信息'
					}
				}
			},
			proof_name: {
				validators: {
					notEmpty: {
						message: '请填写证明名称'
					},
					stringLength: {
                        max: 50,
                        message: '名称不能超过25字'
                    }
				}
			},
			gender: {
				validators: {
					notEmpty: {
						message: '请填写性别信息'
					}
				}
			},
			plan_id: {
				validators: {
					notEmpty: {
						message: '请填写计划编号'
					}
				}
			},
			pin_code: {
				validators: {
					notEmpty: {
						message: '请填写PIN码'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: '输入不是有效的PIN码'
					}
				}
			},
			occupation: {
				validators: {
					notEmpty: {
						message: '请填写职业信息'
					},
					stringLength: {
                        max: 50,
                        message: '职业信息不能超过25字'
                    }
				}
			},
			aim: {
				validators: {
					notEmpty: {
						message: '请填写健身目的'
					},
					stringLength: {
                        max: 50,
                        message: '健身目的不能超过25字'
                    }
				}
			},
			source: {
				validators: {
					notEmpty: {
						message: 'The source is required and can\'t be empty'
					},
					stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
				}
			},
			invoice_number: {
				validators: {
					notEmpty: {
						message: 'The invoice number is required and can\'t be empty'
					}
				}
			},
			admission_amount: {
				validators: {
					notEmpty: {
						message: 'The admission amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			subscription_amount: {
				validators: {
					notEmpty: {
						message: 'The subscription amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			taxes_amount: {
				validators: {
					notEmpty: {
						message: 'The taxes amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			payment_amount: {
				validators: {
					notEmpty: {
						message: 'The amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			invoice_id: {
				  validators: {
					  notEmpty: {
						message: 'The invoice number is required and can\'t be empty'
					}
				}
			},
			date: {
				  validators: {
					  notEmpty: {
						message: 'The cheque date is required and can\'t be empty'
					}
				}
			},
			number: {
				  validators: {
					  notEmpty: {
						message: 'The cheque number is required and can\'t be empty'
					}
				}
			},
			contact: {
				validators: {
					notEmpty: {
						message: 'The contact is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid number'
					},
					stringLength: {
                        max: 11,
                        message: '电话号码不能超过11位'
                    }
				}
			},
			emergency_contact: {
				validators: {
					notEmpty: {
						message: 'The contact is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid number'
					},
					stringLength: {
                        max: 11,
                        message: '电话号码不能超过11位'
                    }
				}
			},
			'plan[0].start_date' : startDateValidators								          
		}
	});
	

