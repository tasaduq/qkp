@extends('layouts.admin')

@section('content')




    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Media</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6 js    ">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Product Details</h3>
            </div>




                
                
                <style id="" media="all">/* cyrillic-ext */
                body,.ad,.sm{font-family:Lucida Grande,Helvetica Neue,Helvetica,Arial,Verdana,sans-serif}a{color:currentColor;text-decoration:none}.clearfix::after{content:'';display:table;clear:both}.ad{width:9.375rem;color:#444;color:rgba( 0,0,0,.75 );background-color:#fff;background-color:rgba( 255,255,255,.5 );position:fixed;z-index:1000;top:.625rem;left:.625rem;padding:.5rem .625rem}.ad--dark{color:#ddd;color:rgba( 255,255,255,.75 );background-color:#111;background-color:rgba( 0,0,0,.5 )}.ad__close{width:.625rem;height:.625rem;background-color:#777;background-color:rgba( 0,0,0,.5 );border-radius:50%;position:absolute;z-index:1;top:-.25rem;right:-.25rem;-webkit-transition:-webkit-transform .25s ease-in-out;transition:transform .25s ease-in-out}.ad--dark .ad__close{background-color:#ddd;background-color:rgba( 255,255,255,.75 )}.ad__close:hover,.ad__close:focus{-webkit-transform:scale( 1.25 );-ms-transform:scale( 1.25 );transform:scale( 1.25 )}#carbonads{font-size:.875rem;letter-spacing:-.071em;line-height:1.125rem}#carbonads a{color:currentColor;display:block;margin-top:.313rem}#carbonads .carbon-poweredby{font-size:.75rem;text-transform:uppercase;color:#aaa;color:rgba( 0,0,0,.25 )}.ad--dark #carbonads .carbon-poweredby{color:#999;color:rgba( 255,255,255,.25 )}.sm{width:100%;height:2.5rem;color:#444;color:rgba( 0,0,0,.75 );background-color:#fff;background-color:rgba( 255,255,255,.5 );overflow:hidden;position:fixed;z-index:1001;bottom:0;left:0;padding:.625rem 1.25rem 0}.sm--dark{color:#ddd;color:rgba( 255,255,255,.75 );background-color:#111;background-color:rgba( 0,0,0,.5 )}.sm ul{}.sm li{float:right;margin-left:1rem}.sm li:first-child{float:left;margin-left:0}.sm .googleplus-one{max-width:60px}.sm .twitter-follow>*:not( :first-child ),.sm .twitter-share>*:not( :first-child ){display:none}@media screen{@media(min-width:0px){.sm li:last-child{opacity:0;-webkit-transition:opacity .25s ease-in-out;transition:opacity .25s ease-in-out}.sm:hover li:last-child{opacity:1}}}.sm__back{font-size:.875rem;font-weight:700;color:currentColor;text-transform:uppercase;position:relative}.sm__back::before{width:0;height:0;border:.313rem solid transparent;border-left:none;border-right-color:currentColor;content:'';display:inline-block;position:relative;left:0;margin-right:.313rem;-webkit-transition:left .25s ease-in-out;transition:left .25s ease-in-out}.sm__back:hover::before,.sm__back:focus::before{left:-.313rem}@media screen and (max-width:40em),screen and (max-height:40em){.ad,.sm{display:none}}
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc3CsTKlA.woff2) format('woff2');
                  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
                }
                /* cyrillic */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc-CsTKlA.woff2) format('woff2');
                  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc2CsTKlA.woff2) format('woff2');
                  unicode-range: U+1F00-1FFF;
                }
                /* greek */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc5CsTKlA.woff2) format('woff2');
                  unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc1CsTKlA.woff2) format('woff2');
                  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc0CsTKlA.woff2) format('woff2');
                  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                  font-family: 'Roboto';
                  font-style: italic;
                  font-weight: 300;
                  src: local('Roboto Light Italic'), local('Roboto-LightItalic'), url(/fonts.gstatic.com/s/roboto/v20/KFOjCnqEu92Fr1Mu51TjASc6CsQ.woff2) format('woff2');
                  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }
                /* cyrillic-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fCRc4EsA.woff2) format('woff2');
                  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
                }
                /* cyrillic */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fABc4EsA.woff2) format('woff2');
                  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fCBc4EsA.woff2) format('woff2');
                  unicode-range: U+1F00-1FFF;
                }
                /* greek */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fBxc4EsA.woff2) format('woff2');
                  unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fCxc4EsA.woff2) format('woff2');
                  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fChc4EsA.woff2) format('woff2');
                  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 300;
                  src: local('Roboto Light'), local('Roboto-Light'), url(/fonts.gstatic.com/s/roboto/v20/KFOlCnqEu92Fr1MmSU5fBBc4.woff2) format('woff2');
                  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }
                /* cyrillic-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format('woff2');
                  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
                }
                /* cyrillic */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu5mxKOzY.woff2) format('woff2');
                  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu7mxKOzY.woff2) format('woff2');
                  unicode-range: U+1F00-1FFF;
                }
                /* greek */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu4WxKOzY.woff2) format('woff2');
                  unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu7WxKOzY.woff2) format('woff2');
                  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format('woff2');
                  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                @font-face {
                  font-family: 'Roboto';
                  font-style: normal;
                  font-weight: 400;
                  src: local('Roboto'), local('Roboto-Regular'), url(/fonts.gstatic.com/s/roboto/v20/KFOmCnqEu92Fr1Mu4mxK.woff2) format('woff2');
                  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                }
                </style>
                <style>
                
                        html
                        {
                        }
                            body
                            {
                                font-family: Roboto, sans-serif;
                                color: #0f3c4b;
                                background-color: #e5edf1;
                                padding: 5rem 1.25rem; /* 80 20 */
                            }
                
                            .container
                            {
                                width: 100%;
                                max-width: 680px; /* 800 */
                                text-align: center;
                                margin: 0 auto;
                            }
                
                                .container h1
                                {
                                    font-size: 42px;
                                    font-weight: 300;
                                    color: #0f3c4b;
                                    margin-bottom: 40px;
                                }
                                .container h1 a:hover,
                                .container h1 a:focus
                                {
                                    color: #39bfd3;
                                }
                
                                .container nav
                                {
                                    margin-bottom: 40px;
                                }
                                    .container nav a
                                    {
                                        border-bottom: 2px solid #c8dadf;
                                        display: inline-block;
                                        padding: 4px 8px;
                                        margin: 0 5px;
                                    }
                                    .container nav a.is-selected
                                    {
                                        font-weight: 700;
                                        color: #39bfd3;
                                        border-bottom-color: currentColor;
                                    }
                                    .container nav a:not( .is-selected ):hover,
                                    .container nav a:not( .is-selected ):focus
                                    {
                                        border-bottom-color: #0f3c4b;
                                    }
                
                                .container footer
                                {
                                    color: #92b0b3;
                                    margin-top: 40px;
                                }
                                    .container footer p + p
                                    {
                                        margin-top: 1em;
                                    }
                                    .container footer a:hover,
                                    .container footer a:focus
                                    {
                                        color: #39bfd3;
                                    }
                
                                .box
                                {
                                    font-size: 1.25rem; /* 20 */
                                    background-color: #c8dadf;
                                    position: relative;
                                    padding: 100px 20px;
                                }
                                .box.has-advanced-upload
                                {
                                    outline: 2px dashed #92b0b3;
                                    outline-offset: -10px;
                
                                    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                    transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                }
                                .box.is-dragover
                                {
                                    outline-offset: -20px;
                                    outline-color: #c8dadf;
                                    background-color: #fff;
                                }
                                    .box__dragndrop,
                                    .box__icon
                                    {
                                        display: none;
                                    }
                                    .box.has-advanced-upload .box__dragndrop
                                    {
                                        display: inline;
                                    }
                                    .box.has-advanced-upload .box__icon
                                    {
                                        width: 100%;
                                        height: 80px;
                                        fill: #92b0b3;
                                        display: block;
                                        margin-bottom: 40px;
                                    }
                
                                    .box.is-uploading .box__input,
                                    .box.is-success .box__input,
                                    .box.is-error .box__input
                                    {
                                        visibility: hidden;
                                    }
                
                                    .box__uploading,
                                    .box__success,
                                    .box__error
                                    {
                                        display: none;
                                    }
                                    .box.is-uploading .box__uploading,
                                    .box.is-success .box__success,
                                    .box.is-error .box__error
                                    {
                                        display: block;
                                        position: absolute;
                                        top: 50%;
                                        right: 0;
                                        left: 0;
                
                                        -webkit-transform: translateY( -50% );
                                        transform: translateY( -50% );
                                    }
                                    .box__uploading
                                    {
                                        font-style: italic;
                                    }
                                    .box__success
                                    {
                                        -webkit-animation: appear-from-inside .25s ease-in-out;
                                        animation: appear-from-inside .25s ease-in-out;
                                    }
                                        @-webkit-keyframes appear-from-inside
                                        {
                                            from	{ -webkit-transform: translateY( -50% ) scale( 0 ); }
                                            75%		{ -webkit-transform: translateY( -50% ) scale( 1.1 ); }
                                            to		{ -webkit-transform: translateY( -50% ) scale( 1 ); }
                                        }
                                        @keyframes appear-from-inside
                                        {
                                            from	{ transform: translateY( -50% ) scale( 0 ); }
                                            75%		{ transform: translateY( -50% ) scale( 1.1 ); }
                                            to		{ transform: translateY( -50% ) scale( 1 ); }
                                        }
                
                                    .box__restart
                                    {
                                        font-weight: 700;
                                    }
                                    .box__restart:focus,
                                    .box__restart:hover
                                    {
                                        color: #39bfd3;
                                    }
                
                                    .js .box__file
                                    {
                                        width: 0.1px;
                                        height: 0.1px;
                                        opacity: 0;
                                        overflow: hidden;
                                        position: absolute;
                                        z-index: -1;
                                    }
                                    .js .box__file + label
                                    {
                                        max-width: 80%;
                                        text-overflow: ellipsis;
                                        white-space: nowrap;
                                        cursor: pointer;
                                        display: inline-block;
                                        overflow: hidden;
                                    }
                                    .js .box__file + label:hover strong,
                                    .box__file:focus + label strong,
                                    .box__file.has-focus + label strong
                                    {
                                        color: #39bfd3;
                                    }
                                    .js .box__file:focus + label,
                                    .js .box__file.has-focus + label
                                    {
                                        outline: 1px dotted #000;
                                        outline: -webkit-focus-ring-color auto 5px;
                                    }
                                        .js .box__file + label *
                                        {
                                            /* pointer-events: none; */ /* in case of FastClick lib use */
                                        }
                
                                    .no-js .box__file + label
                                    {
                                        display: none;
                                    }
                
                                    .no-js .box__button
                                    {
                                        display: block;
                                    }
                                    .box__button
                                    {
                                        font-weight: 700;
                                        color: #e5edf1;
                                        background-color: #39bfd3;
                                        display: none;
                                        padding: 8px 16px;
                                        margin: 40px auto 0;
                                    }
                                        .box__button:hover,
                                        .box__button:focus
                                        {
                                            background-color: #0f3c4b;
                                        }
                
                    </style>
                
                <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script><style>@media print {#ghostery-purple-box {display:none !important}}</style>
                <script style="display: none;">var tvt = tvt || {}; tvt.captureVariables = function(a){for(var b=
                new Date,c={},d=Object.keys(a||{}),e=0,f;f=d[e];e++)if(a.hasOwnProperty(f)&&"undefined"!=typeof a[f])try{var g=[];c[f]=JSON.stringify(a[f],function(l,t){try{if("function"!==typeof t){if("object"===typeof t&&null!==t){if(t instanceof HTMLElement||t instanceof Node||-1!=g.indexOf(t))return;g.push(t)}return t}}catch(A){}})}catch(l){}a=document.createEvent("CustomEvent");a.initCustomEvent("TvtRetrievedVariablesEvent",!0,!0,{variables:c,date:b});window.dispatchEvent(a)};window.setTimeout(function() {tvt.captureVariables({'dataLayer.hide': (function(a){a=a.split(".");for(var b=window,c=0;c<a.length&&(b=b[a[c]],b);c++);return b})('dataLayer.hide'),'gaData': window['gaData'],'dataLayer': window['dataLayer']})}, 2000);</script>
            
            <div class="container" role="main">
                <h1><a href="https://css-tricks.com/article-url"></a></h1>
                {{-- <nav role="navigation">
                <a href="https://css-tricks.com/examples/DragAndDropFileUploading/" class="is-selected">Auto Submit</a>
                <a href="https://css-tricks.com/examples/DragAndDropFileUploading/?submit-on-demand">Submit On Demand</a>
                </nav> --}}
                <form method="post" action="/admin/upload" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload">
                    @csrf
                <div class="box__input">
                <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
                <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
                <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                <button type="submit" class="box__button">Upload</button>
                </div>
                <div class="box__uploading">Uploading…</div>
                <div class="box__success">Done! <a href="/admin/upload" class="box__restart" role="button">Upload more?</a></div>
                <div class="box__error">Error! <span></span>. <a href="/admin/upload" class="box__restart" role="button">Try again!</a></div>
                <input type="hidden" name="ajax" value="1"><input type="hidden" name="ajax" value="1"></form>
                <footer>
                <p><strong>Be sure to try the demo on a browser (e.g. IE 9 and below) that does not support drag&amp;drop file upload. You can also try with a JavaScript support disabled.</strong></p>
                <p>The icon was borrowed from <a href="http://www.flaticon.com/free-icon/outbox_3686" target="_blank">FlatIcon</a>.</p>
                </footer>
                </div>
                <script>

                    'use strict';
                
                    ;( function ( document, window, index )
                    {
                        // feature detection for drag&drop upload
                        var isAdvancedUpload = function()
                            {
                                var div = document.createElement( 'div' );
                                return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
                            }();
                
                
                        // applying the effect for every form
                        var forms = document.querySelectorAll( '.box' );
                        Array.prototype.forEach.call( forms, function( form )
                        {
                            var input		 = form.querySelector( 'input[type="file"]' ),
                                label		 = form.querySelector( 'label' ),
                                errorMsg	 = form.querySelector( '.box__error span' ),
                                restart		 = form.querySelectorAll( '.box__restart' ),
                                droppedFiles = false,
                                showFiles	 = function( files )
                                {
                                    label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
                                },
                                triggerFormSubmit = function()
                                {
                                    var event = document.createEvent( 'HTMLEvents' );
                                    event.initEvent( 'submit', true, false );
                                    form.dispatchEvent( event );
                                };
                
                            // letting the server side to know we are going to make an Ajax request
                            var ajaxFlag = document.createElement( 'input' );
                            ajaxFlag.setAttribute( 'type', 'hidden' );
                            ajaxFlag.setAttribute( 'name', 'ajax' );
                            ajaxFlag.setAttribute( 'value', 1 );
                            form.appendChild( ajaxFlag );
                
                            // automatically submit the form on file select
                            input.addEventListener( 'change', function( e )
                            {
                                showFiles( e.target.files );
                
                                
                                triggerFormSubmit();
                
                                
                            });
                
                            // drag&drop files if the feature is available
                            if( isAdvancedUpload )
                            {
                                form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser
                
                                [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
                                {
                                    form.addEventListener( event, function( e )
                                    {
                                        // preventing the unwanted behaviours
                                        e.preventDefault();
                                        e.stopPropagation();
                                    });
                                });
                                [ 'dragover', 'dragenter' ].forEach( function( event )
                                {
                                    form.addEventListener( event, function()
                                    {
                                        form.classList.add( 'is-dragover' );
                                    });
                                });
                                [ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
                                {
                                    form.addEventListener( event, function()
                                    {
                                        form.classList.remove( 'is-dragover' );
                                    });
                                });
                                form.addEventListener( 'drop', function( e )
                                {
                                    droppedFiles = e.dataTransfer.files; // the files that were dropped
                                    showFiles( droppedFiles );
                
                                    
                                    triggerFormSubmit();
                
                                                    });
                            }
                
                
                            // if the form was submitted
                            form.addEventListener( 'submit', function( e )
                            {
                                // preventing the duplicate submissions if the current one is in progress
                                if( form.classList.contains( 'is-uploading' ) ) return false;
                
                                form.classList.add( 'is-uploading' );
                                form.classList.remove( 'is-error' );
                
                                if( isAdvancedUpload ) // ajax file upload for modern browsers
                                {
                                    e.preventDefault();
                
                                    // gathering the form data
                                    var ajaxData = new FormData( form );
                                    if( droppedFiles )
                                    {
                                        Array.prototype.forEach.call( droppedFiles, function( file )
                                        {
                                            ajaxData.append( input.getAttribute( 'name' ), file );
                                        });
                                    }
                
                                    // ajax request
                                    var ajax = new XMLHttpRequest();
                                    ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );
                
                                    ajax.onload = function()
                                    {
                                        form.classList.remove( 'is-uploading' );
                                        if( ajax.status >= 200 && ajax.status < 400 )
                                        {
                                            var data = JSON.parse( ajax.responseText );
                                            form.classList.add( data.success == true ? 'is-success' : 'is-error' );
                                            if( !data.success ) errorMsg.textContent = data.error;
                                        }
                                        else alert( 'Error. Please, contact the webmaster!' );
                                    };
                
                                    ajax.onerror = function()
                                    {
                                        form.classList.remove( 'is-uploading' );
                                        alert( 'Error. Please, try again!' );
                                    };
                
                                    ajax.send( ajaxData );
                                }
                                else // fallback Ajax solution upload for older browsers
                                {
                                    var iframeName	= 'uploadiframe' + new Date().getTime(),
                                        iframe		= document.createElement( 'iframe' );
                
                                        $iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );
                
                                    iframe.setAttribute( 'name', iframeName );
                                    iframe.style.display = 'none';
                
                                    document.body.appendChild( iframe );
                                    form.setAttribute( 'target', iframeName );
                
                                    iframe.addEventListener( 'load', function()
                                    {
                                        var data = JSON.parse( iframe.contentDocument.body.innerHTML );
                                        form.classList.remove( 'is-uploading' )
                                        form.classList.add( data.success == true ? 'is-success' : 'is-error' )
                                        form.removeAttribute( 'target' );
                                        if( !data.success ) errorMsg.textContent = data.error;
                                        iframe.parentNode.removeChild( iframe );
                                    });
                                }
                            });
                
                
                            // restart the form if has a state of error/success
                            Array.prototype.forEach.call( restart, function( entry )
                            {
                                entry.addEventListener( 'click', function( e )
                                {
                                    e.preventDefault();
                                    form.classList.remove( 'is-error', 'is-success' );
                                    input.click();
                                });
                            });
                
                            // Firefox focus bug fix for file input
                            input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                            input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
                
                        });
                    }( document, window, 0 ));
                
                </script>

            </div>
          </div>
        </div>
      </div>
      
    
    @endsection