$(document).ready(function() {
				$('#enquiriesform').bootstrapValidator({
					fields: {
						name: {
							validators: {
								notEmpty: {
									message: '姓名不能为空'
								},
								stringLength: {
			                        max: 50,
			                        message: '名字不能超过25字'
			                    }
							}
						},
						address: {
							validators: {
								notEmpty: {
									message: '会籍不能为空'
								},
								stringLength: {
			                        max: 200,
			                        message: '会籍信息不能超过100字'
			                    }
							}
						},
						email: {
							validators: {
								notEmpty: {
									message: '要求电子邮箱地址'
								},
								emailAddress: {
									message: '无效电子邮箱地址'
								},
								stringLength: {
			                        max: 50,
			                        message: '电子邮箱地址不能超50字符'
			                    }
							}
						},
						gender: {
							validators: {
								notEmpty: {
									message: '性别信息不能为空'
								}
							}
						},
						pin_code: {
							validators: {
								notEmpty: {
									message: 'PIN 码不能为空'
								},
								regexp: {
									regexp: /^[0-9_\.]+$/,
									message: '无效PIN码'
								}
							}
						},
						occupation: {
							validators: {
								notEmpty: {
									message: '职业信息不能为空'
								},
								stringLength: {
			                        max: 50,
			                        message: '职业信息不能超25字'
			                    }
							}
						},
						aim: {
							validators: {
								notEmpty: {
									message: '目标不能为空'
								},
								stringLength: {
			                        max: 50,
			                        message: '目标信息不能超25字'
			                    }
							}
						},
						source: {
							validators: {
								notEmpty: {
									message: '来源信息不能为空'
								},
								stringLength: {
			                        max: 50,
			                        message: '来源信息不能超25字'
			                    }
							}
						},
						date: {
							validators: {
								notEmpty: {
									message: '日期不能为空'
								}
							}
						},
						due_date: {
							validators: {
								notEmpty: {
									message: '到期日期不能为空'
								}
							}
						},
						followup_by: {
							validators: {
								notEmpty: {
									message: '追访信息不能为空'
								}
							}
						},
						status: {
							validators: {
								notEmpty: {
									message: '状态信息不能为空'
								}
							}
						},
						outcome: {
							validators: {
								notEmpty: {
									message: '目标不能为空'
								}
							}
						},
						interested_in: {
							validators: {
								notEmpty: {
									message: '字段不能为空'
								},
								stringLength: {
			                        max: 50,
			                        message: '不能超25字'
			                    }
							}
						},
						contact: {
							validators: {
								notEmpty: {
									message: '联系信息不能为空'
								},
								regexp: {
									regexp: /^[0-9_\.]+$/,
									message: '输入无效号码'
								},
								stringLength: {
			                        max: 11,
			                        message: '号码不能超11位'
			                    }
							}
						}
					}
				});
			});

