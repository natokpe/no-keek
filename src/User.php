<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

declare(strict_types = 1);

namespace NatOkpe\Wp\Theme\Keek;

use NatOkpe\Wp\Plugin\KeekSetup\Utils\DataList;

use \DateTime;
use \DateTimeZone;

use \WP_User;
use \WP_Query;

class User
{
    private
    $_u = null;

    private
    $_exists = null;

    private
    $_meta = [];

    public
    function __construct(int $user_id)
    {
        $this->_u = new WP_User($user_id);
        $this->_exists = $this->_u->exists();
    }

    // public
    // function verifyEmail(string $email = ''): bool
    // {
    //     return false;
    // }

    // public static
    // function filterApplication(array $app): array
    // {
    //     $fil = array_fill_keys([
    //         'profile_firstname',
    //         'profile_lastname',
    //         'profile_othernames',
    //         'profile_dob',
    //         'profile_gender',
    //         'profile_marital_status',
    //         'profile_disability',
    //         'contact_email',
    //         'contact_phone',
    //         'contact_whatsapp',
    //         'contact_telegram',
    //         'contact_linkedin',
    //         'contact_facebook',
    //         'contact_x',
    //         'contact_addr_line_1',
    //         'contact_addr_line_2',
    //         'contact_addr_country',
    //         'contact_addr_state',
    //         'contact_addr_city',
    //         'contact_addr_postcode',
    //         'contact_addr_landmark',
    //         'education_qualification',
    //         'employment_industry',
    //         'employment_occupation',
    //         'employment_status',
    //         'skill_level',
    //         'skill_meeting_tools',
    //         'skill_software_tools',
    //         'finance_inclusion',
    //         'finance_inclusion_comment',
    //         'extra_courses',
    //         'extra_pc_access',
    //         'extra_availability',
    //         'extra_referrer',
    //         'extra_referrer_comment',
    //         'extra_aim',
    //     ], null);

    //     foreach ($app as $_ => $__) {
    //         switch ($_) {
    //             case 'profile_firstname':
    //             case 'profile_lastname':
    //             case 'profile_othernames':
    //                 $fil[$_] = (is_string($__)
    //                 && (! empty($__))
    //                 && (strlen($__) < 30)) ? $__ : null;
    //                 break;

    //             case 'profile_dob':
    //                 $d = DateTime::createFromFormat(
    //                     'Y-m-d H:i:s',
    //                     is_string($__) ? $__ : '',
    //                     new DateTimeZone('UTC')
    //                 );

    //                 $fil[$_] = ($d instanceOf DateTime) ? $d : null;
    //                 break;

    //             case 'profile_gender':
    //                 $fil[$_] = array_key_exists(
    //                     $__,
    //                     DataList::get('gender')
    //                 ) ? $__ : null;
    //                 break;

    //             case 'profile_marital_status':
    //                 $fil[$_] = array_key_exists(
    //                     $__,
    //                     DataList::get('marital_status')
    //                 ) ? $__ : null;
    //                 break;

    //             case 'profile_disability':
    //                 break;

    //             case 'contact_email':
    //                 $fil[$_] = filter_var(
    //                     $__,
    //                     FILTER_VALIDATE_EMAIL,
    //                     [
    //                         'default' => null,
    //                         'flags'   => FILTER_NULL_ON_FAILURE,
    //                     ]
    //                 );
    //                 break;

    //             case 'contact_phone':
    //             case 'contact_whatsapp':
    //                 // $fil[$_] = empty($__) ? null : 
    //                 break;

    //             case 'contact_telegram':
    //             case 'contact_linkedin':
    //             case 'contact_facebook':
    //             case 'contact_x':
    //                 break;

    //             case 'contact_addr_line_1':
    //             case 'contact_addr_line_2':
    //                 break;

    //             case 'contact_addr_country':
    //                 break;

    //             case 'contact_addr_state':
    //                 break;

    //             case 'contact_addr_city':
    //                 break;

    //             case 'contact_addr_postcode':
    //                 break;

    //             case 'contact_addr_landmark':
    //                 break;

    //             case 'education_qualification':
    //                 break;

    //             case 'employment_industry':
    //                 break;

    //             case 'employment_occupation':
    //                 break;

    //             case 'employment_status':
    //                 break;

    //             case 'skill_level':
    //                 break;

    //             case 'skill_meeting_tools':
    //                 break;

    //             case 'skill_software_tools':
    //                 break;

    //             case 'finance_inclusion':
    //                 break;

    //             case 'finance_inclusion_comment':
    //             case 'extra_courses':
    //             case 'extra_pc_access':
    //             case 'extra_availability':
    //             case 'extra_referrer':
    //             case 'extra_referrer_comment':
    //             case 'extra_aim':
    //                 break;
    //         }
    //     }
    // }

    // public
    // function emailVerified(): bool
    // {
    //     if (! $this->_exists) {
    //         return false;
    //     }

    //     $flag = get_user_meta($this->_u->ID, 'email_verified', true);

    //     if (empty($flag)) {
    //         return false;
    //     }

    //     $flag = DateTime::createFromFormat(
    //         'Y-m-d H:i:s',
    //         $flag,
    //         new DateTimeZone('UTC')
    //     );

    //     return $flag !== false;
    // }

    // public
    // function applyDone(): bool
    // {
    //     if (! $this->_exists) {
    //         return false;
    //     }

    //     $app = (new WP_Query([
    //         'post_type'    => 'application',
    //         'nopaging'     => true,
    //         'meta_query'   => [
    //             [
    //                 'key'     => 'applicant',
    //                 'value'   => $this->_u->ID,
    //                 'compare' => '=',
    //             ],
    //         ],
    //     ]))->posts;

    //     var_dump($app);exit;

    //     return false;
    // }

    // public
    // function ready(?int $id = null): bool
    // {
    //     return false;
    // }
}
/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
