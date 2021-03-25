<section class="top-item-content">
    <div class="curencies-block">
    <svg id="exchange" xmlns="http://www.w3.org/2000/svg" width="26.735" height="26.735" viewBox="0 0 26.735 26.735">
        <path id="Path_90" data-name="Path 90" d="M10.971,238.487l-1.566-1.566a.783.783,0,0,0-1.108,0,.774.774,0,0,0-.053,1.028A8.626,8.626,0,0,1,2.086,231.8a8.679,8.679,0,0,1-1.837-1.9,10.189,10.189,0,0,0,8.437,9.769l-.388.387a.783.783,0,0,0,1.108,1.108l1.566-1.566A.786.786,0,0,0,10.971,238.487Z" transform="translate(-0.236 -217.893)" fill="#fff"/>
        <path id="Path_91" data-name="Path 91" d="M302.253,64.905l1.566,1.566a.783.783,0,0,0,1.108,0,.774.774,0,0,0,.053-1.028,8.626,8.626,0,0,1,6.159,6.152,8.681,8.681,0,0,1,1.837,1.9,10.189,10.189,0,0,0-8.437-9.768l.388-.387a.783.783,0,0,0-1.108-1.108L302.253,63.8A.786.786,0,0,0,302.253,64.905Z" transform="translate(-286.254 -58.763)" fill="#fff"/>
        <path id="Path_92" data-name="Path 92" d="M249.049,242a7.049,7.049,0,1,0,7.049,7.049A7.057,7.057,0,0,0,249.049,242Zm2.987,3.432-1.465,2.051h.045a.783.783,0,0,1,0,1.566h-.783v1.566h.783a.783.783,0,0,1,0,1.566h-.783v1.567a.783.783,0,1,1-1.567,0v-1.567h-.783a.783.783,0,1,1,0-1.566h.783v-1.566h-.783a.783.783,0,1,1,0-1.566h.044l-1.465-2.051a.783.783,0,1,1,1.275-.91l1.712,2.4,1.712-2.4a.783.783,0,1,1,1.275.91Z" transform="translate(-229.363 -229.363)" fill="#fff"/>
        <path id="Path_93" data-name="Path 93" d="M7.049,0A7.049,7.049,0,1,0,14.1,7.049,7.057,7.057,0,0,0,7.049,0Zm.783,10.821v.928a.783.783,0,0,1-1.567,0v-.926a2.329,2.329,0,0,1-.88-.547A.784.784,0,0,1,6.5,9.17a.812.812,0,0,0,1.336-.554.784.784,0,0,0-.783-.783,2.344,2.344,0,0,1-.783-4.555V2.35a.783.783,0,1,1,1.567,0v.926a2.329,2.329,0,0,1,.88.547A.784.784,0,0,1,7.6,4.928a.811.811,0,0,0-1.336.554.784.784,0,0,0,.783.783,2.344,2.344,0,0,1,.783,4.555Z" fill="#fff"/>
    </svg> 
    

    @foreach (getCurencies() as $rate)
        @if($rate->ISO == 'USD')
            @php
                $usd = (float)($rate->Rate);
            @endphp
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="6.704" height="12.875" viewBox="0 0 6.704 12.875">
                            <path id="Icon_metro-dollar2" data-name="Icon metro-dollar2" d="M16.661,10.717a2.733,2.733,0,0,1-.715,1.893,3.085,3.085,0,0,1-1.857.981v1.257a.221.221,0,0,1-.23.23h-.97a.233.233,0,0,1-.23-.23V13.591a4.529,4.529,0,0,1-.916-.223,4.412,4.412,0,0,1-1.261-.665,4.1,4.1,0,0,1-.334-.269q-.09-.086-.126-.129a.218.218,0,0,1-.014-.295l.74-.97a.224.224,0,0,1,.165-.086.178.178,0,0,1,.172.065l.014.014a3.752,3.752,0,0,0,1.746.9,2.51,2.51,0,0,0,.532.057A1.742,1.742,0,0,0,14.4,11.68a1.006,1.006,0,0,0,.442-.877.728.728,0,0,0-.108-.381,1.346,1.346,0,0,0-.241-.3,1.972,1.972,0,0,0-.42-.269q-.287-.147-.474-.23t-.575-.233l-.442-.18q-.162-.065-.442-.19T11.693,8.8q-.169-.1-.406-.255a2.53,2.53,0,0,1-.384-.305,4.478,4.478,0,0,1-.313-.352,1.758,1.758,0,0,1-.255-.417,2.881,2.881,0,0,1-.151-.478,2.494,2.494,0,0,1-.061-.56,2.457,2.457,0,0,1,.7-1.739,3.287,3.287,0,0,1,1.832-.963V2.433a.233.233,0,0,1,.23-.23h.97a.221.221,0,0,1,.23.23V3.7a4,4,0,0,1,.794.165,4.6,4.6,0,0,1,.625.241,3.462,3.462,0,0,1,.456.269q.216.151.28.208t.108.1a.208.208,0,0,1,.036.273L15.806,6a.2.2,0,0,1-.165.115.229.229,0,0,1-.194-.05q-.022-.022-.1-.086t-.28-.19a3.707,3.707,0,0,0-.42-.23,3.209,3.209,0,0,0-.535-.187,2.4,2.4,0,0,0-.614-.083,1.867,1.867,0,0,0-1.114.309.966.966,0,0,0-.37,1.142.809.809,0,0,0,.212.3,3.166,3.166,0,0,0,.284.237,2.531,2.531,0,0,0,.4.223q.269.126.435.194t.5.2q.381.144.582.226t.546.251a4.34,4.34,0,0,1,.542.305,4.587,4.587,0,0,1,.445.359,1.86,1.86,0,0,1,.381.456,2.6,2.6,0,0,1,.226.55,2.37,2.37,0,0,1,.093.675Z" transform="translate(-9.957 -2.203)" fill="#fff"/>
                </svg> {{$usd}}
            </span>
        @elseif($rate->ISO == 'EUR')
            @php
                $usd = (float)($rate->Rate);
            @endphp
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="10.827" height="10.827" viewBox="0 0 10.827 10.827">
                        <path id="Icon_material-euro-symbol" data-name="Icon material-euro-symbol" d="M11.718,13.823a3.9,3.9,0,0,1-3.465-2.105h3.465v-1.2H7.856a3.783,3.783,0,0,1,0-1.2h3.862v-1.2H8.253a3.9,3.9,0,0,1,6.009-1.161l1.065-1.065A5.405,5.405,0,0,0,6.617,8.109H4.5v1.2H6.341a5.03,5.03,0,0,0,0,1.2H4.5v1.2H6.617a5.405,5.405,0,0,0,8.709,2.225l-1.071-1.065a3.853,3.853,0,0,1-2.538.944Z" transform="translate(-4.5 -4.5)" fill="#fff"/>
                </svg> {{$usd}}
            </span>
            @elseif($rate->ISO == 'RUB')
            @php
                $usd = (float)($rate->Rate);
            @endphp
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="9.636" height="11.243" viewBox="0 0 9.636 11.243">
                        <path id="Icon_awesome-ruble-sign" data-name="Icon awesome-ruble-sign" d="M6.007,9.477A3.475,3.475,0,0,0,9.636,5.84a3.438,3.438,0,0,0-3.63-3.59h-4.1a.3.3,0,0,0-.3.3V7.737H.3a.3.3,0,0,0-.3.3V9.176a.3.3,0,0,0,.3.3h1.3v.8H.3a.3.3,0,0,0-.3.3v1a.3.3,0,0,0,.3.3h1.3v1.3a.3.3,0,0,0,.3.3h1.47a.3.3,0,0,0,.3-.3v-1.3H7.729a.3.3,0,0,0,.3-.3v-1a.3.3,0,0,0-.3-.3H3.678v-.8Zm-2.329-5.5H5.653A1.738,1.738,0,0,1,7.533,5.84a1.763,1.763,0,0,1-1.911,1.9H3.678V3.975Z" transform="translate(0 -2.25)" fill="#fff"/>
                </svg> {{$usd}}
            </span> 
            @elseif($rate->ISO == 'GBP')
            @php
                $usd = (float)($rate->Rate);
            @endphp
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="7.94" height="10.961" viewBox="0 0 7.94 10.961">
                    <path id="Icon_metro-gbp" data-name="Icon metro-gbp" d="M17.123,12.261v2.857a.24.24,0,0,1-.249.249H9.432a.24.24,0,0,1-.249-.249V13.951a.253.253,0,0,1,.249-.249h.755V10.72h-.74a.236.236,0,0,1-.179-.074.246.246,0,0,1-.07-.175V9.451A.24.24,0,0,1,9.448,9.2h.74V7.466a2.822,2.822,0,0,1,.961-2.2A3.524,3.524,0,0,1,13.6,4.407,3.972,3.972,0,0,1,16.2,5.38a.23.23,0,0,1,.078.16.241.241,0,0,1-.054.175l-.8.989a.239.239,0,0,1-.171.093.208.208,0,0,1-.179-.054,1.711,1.711,0,0,0-.2-.148,2.834,2.834,0,0,0-.537-.249,2.057,2.057,0,0,0-.724-.14,1.53,1.53,0,0,0-1.066.366,1.23,1.23,0,0,0-.4.957V9.2h2.374a.246.246,0,0,1,.175.07.236.236,0,0,1,.074.179v1.02a.253.253,0,0,1-.249.249H12.141v2.95h3.223V12.261a.246.246,0,0,1,.07-.175.236.236,0,0,1,.179-.074h1.261a.236.236,0,0,1,.179.074.246.246,0,0,1,.07.175Z" transform="translate(-9.183 -4.407)" fill="#fff"/>
                </svg> {{$usd}}
            </span>  
        @endif
    @endforeach
    </div>    
</section><!-- end .footer-item-head -->
