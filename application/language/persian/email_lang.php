<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['email_must_be_array'] = 'متد تعیین صلاحیت (validation) باید آرایه بر گرداند.';
$lang['email_invalid_address'] = 'آدرس ایمیل %s اشتباه است.';
$lang['email_attachment_missing'] = 'این الحاقیه: %s پیدا نشد.';
$lang['email_attachment_unreadable'] = 'این الحاقیه : %s باز نشد.';
$lang['email_no_recipients'] = 'نام گیرنده را در گیرنده (To) یا کپی (CC) یا کپی نامرئی (BCC) معین کنید.';
$lang['email_send_failure_phpmail'] = 'امکان ارسال ایمیل با PHP mail() نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_send_failure_sendmail'] = 'امکان ارسال ایمیل با PHP Sendmail نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_send_failure_smtp'] = 'امکان ارسال ایمیل با PHP SMTP نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_sent'] = 'نامه شما با موفقیت ارسال شد پروتکل استفاده شده: %s';
$lang['email_no_socket'] = 'امکان باز کردن درگاه (سوکت) به Sendmail نیست. لطفا تنظیمات را بازنگری کنید.';
$lang['email_no_hostname'] = 'نام سرویس دهنده (hostname) SMTP تعیین نشده.';
$lang['email_smtp_error'] = 'خطای SMTP رخ داده است : %s';
$lang['email_no_smtp_unpw'] = 'خطا: نام کاربری و رمز عبور SMTP را وارد کنید.';
$lang['email_failed_smtp_login'] = 'خطای ارسال دستور AUTH LOGIN، خطا: %s';
$lang['email_smtp_auth_un'] = 'خطای زمان ورود از نام کاربری، خطا: %s';
$lang['email_smtp_auth_pw'] = 'خطای زمان ورود از رمز عبور، خطا: %s';
$lang['email_smtp_data_failure'] = 'امکان ارسال دیتا نیست : %s';
$lang['email_exit_status'] = 'كد وضعیت خروج: %s';

$lang['email_no_from'] = 'Cannot send mail with no "From" header.';


/* End of file email_lang.php */
/* Location: ./system/language/english/email_lang.php */