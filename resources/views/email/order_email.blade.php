<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
      td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
  <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen">
    <style>
      .hover-underline:hover {
        text-decoration: underline !important;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }

      @keyframes ping {

        75%,
        100% {
          transform: scale(2);
          opacity: 0;
        }
      }

      @keyframes pulse {
        50% {
          opacity: .5;
        }
      }

      @keyframes bounce {

        0%,
        100% {
          transform: translateY(-25%);
          animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
        }

        50% {
          transform: none;
          animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }
      }

      @media (max-width: 600px) {
        .sm-px-24 {
          padding-left: 24px !important;
          padding-right: 24px !important;
        }

        .sm-py-32 {
          padding-top: 32px !important;
          padding-bottom: 32px !important;
        }

        .sm-w-full {
          width: 100% !important;
        }
      }
    </style>
    </head>
    <body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased;">
        <div role="article" aria-roledescription="email" aria-label="" lang="en">
            <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" width="100%" cellpadding="0"    cellspacing="0" role="presentation">
                <tbody>
                    <tr>
                        <td align="center" style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" bgcolor="rgba(236, 239, 241, var(--bg-opacity))">
                            <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">
                                <tbody>
                                    <tr>
                                        <td class="sm-py-32 sm-px-24" style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; padding: 48px; text-align: center;" align="center">
                                            <a href="{{ url('/') }}">
                                                <img src="{{ asset('public-assets/image/logo1.png') }}" width="155" alt="Vuexy Admin" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class="sm-px-24" style="font-family: 'Montserrat',Arial,sans-serif;">
                                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; background-color: rgba(255, 255, 255, var(--bg-opacity)); border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="left">
                                                            <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">{{ __('Hello')}}</p>
                                                            <p style="margin: 0 0 24px;">
                                                            Merci d'avoir utilisé IGRAIN. Il s'agit d'une facture pour votre achat récent.
                                                            </p>

                                                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;margin:25px 0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="font-family: 'Montserrat',Arial,sans-serif;">
                                                                        <h3 style="font-weight: 700; font-size: 12px; margin-top: 0; text-align: left;">#{{$order->ref}}</h3>
                                                                        </td>
                                                                        <td style="font-family: 'Montserrat',Arial,sans-serif;">
                                                                        <h3 style="font-weight: 700; font-size: 12px; margin-top: 0; text-align: right;">
                                                                            {{ $order->created_at }}
                                                                        </h3>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="font-family: 'Montserrat',Arial,sans-serif;">
                                                                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation" border="1" >
                                                                                <tr>
                                                                                    <th style="width: 60%;padding: 8px;" >{{ __('Product') }}</th>
                                                                                    <th style="width: 20%;padding: 8px;" >{{ __('Quantity') }}</th>
                                                                                    <th style="width: 20%;padding: 8px;" >{{ __('Amount') }}</th>
                                                                                </tr>
                                                                                @php
                                                                                    $total = 0
                                                                                @endphp
                                                                                @forelse ($order->variants as $variant )
                                                                                    @if (isset($variant->pivot))
                                                                                        @php
                                                                                            $quantity =$variant->pivot->quantity;
                                                                                            $price = $variant->pivot->price;
                                                                                            $total += $quantity * $price ;
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td style="padding: 8px;">{{$variant->product->getLabel() }}</td>
                                                                                            <td style="padding: 8px;text-align: center">{{$quantity}}</td>
                                                                                            <td style="padding: 8px;text-align: center">{{ $price}}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @empty

                                                                                @endforelse
                                                                                <tr>
                                                                                    <td style="font-family: 'Montserrat',Arial,sans-serif;" colspan="2" >
                                                                                        <p align="right" style="font-weight: 700; font-size: 14px; line-height: 24px; margin: 0; padding-right: 16px; text-align: right;" >
                                                                                        Total
                                                                                        </p>
                                                                                    </td>
                                                                                    <td style="font-family: 'Montserrat',Arial,sans-serif;">
                                                                                        <p align="right" style="font-weight: 700; font-size: 14px; line-height: 24px; margin: 0; text-align: center;">
                                                                                        {{$total}} DH
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <p style="font-size: 14px; line-height: 24px; margin-top: 6px; margin-bottom: 20px;">
                                                                Si vous avez des questions sur cette facture, répondez simplement à cet e-mail ou contactez notre équipe d'assistance pour obtenir de l'aide.
                                                            </p>
                                                            <p style="font-size: 14px; line-height: 24px; margin-top: 6px; margin-bottom: 20px;">
                                                            L'équipe IGRAIN
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 12px; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1; color: rgba(236, 239, 241, var(--text-opacity));">
                                            <p style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity));text-align: center">
                                                © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;" height="16"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
