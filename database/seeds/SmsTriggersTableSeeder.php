<?php

use App\Sms_trigger;
use Illuminate\Database\Seeder;

class SmsTriggersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create SMS Triggers
        $sms_triggers = [
            [
                'name' => '入会 (已支付)',
                'alias' => 'member_admission_with_paid_invoice',
                'message' => '你好： %s , 欢迎来到 %s， 您的编号为：%u的付款已经收到， 单据号为：%s， 非常感谢，希望不久见到您. 祝好!',
                'status' => '0',
            ],
            [
                'name' => '入会 (部分支付)',
                'alias' => 'member_admission_with_partial_invoice',
                'message' => '你好： %s , 欢迎来到 %s， 您的编号为：%u的付款已经收到， 单据号为：%s， 未结清的支付编号为：%u . 谢谢',
                'status' => '0',
            ],
            [
                'name' => '入会 (未支付)',
                'alias' => 'member_admission_with_unpaid_invoice',
                'message' => '你好： %s , 欢迎来到 %s， 您的付款编号为：%u， 单据号为：%s， 谢谢!',
                'status' => '0',
            ],
            [
                'name' => '询问信息',
                'alias' => 'enquiry_placement',
                'message' => '你好：%s , 感谢您对%s的查询 . 我们希望能收到您的回复. 祝好!',
                'status' => '0',
            ],
            [
                'name' => '跟进调查',
                'alias' => 'followup',
                'message' => '你好：%s , 这是关于您在%s的查询 . 请让我们知道您想从什么时候开始? 祝好!',
                'status' => '0',
            ],
            [
                'name' => '续订 (已支付)',
                'alias' => 'subscription_renewal_with_paid_invoice',
                'message' => '你好 %s , 您的订阅已成功更新。 您的发票编号为%u的付款已收到， 单据号为：%s， 谢谢！',
                'status' => '0',
            ],
            [
                'name' => '续订 (部分支付)',
                'alias' => 'subscription_renewal_with_partial_invoice',
                'message' => '你好 %s , 您的订阅已成功更新。 您的编号为：%u的付款已经收到， 单据号为：%s， 未结清的支付编号为：%u . 谢谢!',
                'status' => '0',
            ],
            [
                'name' => '续订 (未支付)',
                'alias' => 'subscription_renewal_with_unpaid_invoice',
                'message' => '你好 %s , 您的订阅已成功更新。 您的付款编号为：%u， 单据号为：%s， 谢谢!',
                'status' => '0',
            ],
            [
                'name' => '订阅即将到期',
                'alias' => 'subscription_expiring',
                'message' => '你好 %s ,  最近几天更新您的健身房订阅， 请在%s之前续订 . 谢谢!',
                'status' => '0',
            ],
            [
                'name' => '订阅即将到期',
                'alias' => 'subscription_expired',
                'message' => '你好 %s , 您的健身房订阅将在%s到期 . 请尽快续订!',
                'status' => '0',
            ],
            [
                'name' => '收到付款',
                'alias' => 'payment_recieved',
                'message' => '你好： %s, 您的编号为：%u的付款已经收到， 单据号为：%s',
                'status' => '0',
            ],
            [
                'name' => '待发票',
                'alias' => 'pending_invoice',
                'message' => '你好： %s , 您的编号为：%u的付款，发票号为%s，仍在处于等待状态 . 请尽快结清!',
                'status' => '0',
            ],
            [
                'name' => '费用警报',
                'alias' => 'expense_alert',
                'message' => '你好： %s , 您好一笔费用需要结清， 谢谢!',
                'status' => '0',
            ],
            [
                'name' => '会员生日愿望',
                'alias' => 'member_birthday',
                'message' => '你好： %s , %s组 祝您生日快乐 :) 祝好！使用支票支付',
                'status' => '0',
            ],
            [
                'name' => '使用支票支付',
                'alias' => 'payment_with_cheque',
                'message' => '你好： %s , 您的支票：%u， 支票编号：%u已经收到， 支票单据号为：%s . 问候您 %s .',
                'status' => '0',
            ],
        ];

        foreach ($sms_triggers as $sms_trigger) {
            Sms_trigger::create($sms_trigger);
        }
    }
}
