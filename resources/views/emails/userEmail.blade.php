@component('mail::message')
    <div class="" style="  background-color: #ffffff; table-layout: fixed; width: 100%; vertical-align: top; ">
        <table style=" width: 552px; overflow: visible; margin: 0 auto; vertical-align: middle; ">
            <tbody>
                <tr>
                    <td style="border-left: 1px solid #e0e3eb; border-top: 1px solid #e0e3eb; border-right: 1px solid #e0e3eb; border-bottom: 1px solid #e0e3eb; ">
                        <table border="0" cellspacing="0" cellpadding="0" style="width: 550px;">
                            <tbody>
                                <tr>
                                    <td style="background-color: #ffffff;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            style="min-width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style=" padding-left: 35px; padding-right: 35px; padding-top: 36px; padding-bottom: 15px; ">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0" style="min-width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div style=" font-family: Helvetica, Arial, sans-serif; font-size: 20px; line-height: 28px; font-weight: bold; text-align: left; color: #0a2540; ">
                                                                            {{ $title }}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffffff;">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            style="min-width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style=" padding-left: 35px; padding-right: 35px;  padding-bottom: 36px; ">
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="min-width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div style=" font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; font-weight: normal; text-align: left; color: #425466;">
                                                                            {{$description}}
                                                                            <div class="" style="text-align: left; color: gray;"> Regards,
                                                                                <br /> {{ config('app.name') }}
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endcomponent
