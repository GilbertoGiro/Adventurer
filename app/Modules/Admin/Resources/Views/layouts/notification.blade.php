<div class="inline-block m-r-md action pointer notifications dropdown">
    <i class="fa fa-bell milk"></i>
    <span class="notification-count align-top inline-block">{{ count($notifications) }}</span>

    <div class="dropdown-items text-left">
        <div class="block" style="border-bottom:1px solid #E0E0E0;padding:12px 3px 12px 3px;">
            <b class="block" style="font-size:18px;">Notificações</b>
        </div>

        <div class="notifications overflow-auto without-scroll">
            @if(count($notifications))
                @foreach($notifications as $notification)
                    <div class="notification block">
                        <span class="block">
                            {!! $notification['data']['message'] !!} - <b>{{ $notification['data']['issuer'] }}:</b>
                        </span>
                    </div>
                @endforeach
            @else
                <div class="notification block">
                    Você não possui nenhuma notificação <b>pendente</b> e/ou <b>nova</b>
                </div>
            @endif
        </div>

        <div class="block" style="border-top:1px solid #E0E0E0;padding:15px 3px 15px 3px;">
            <span class="bold" style="font-size:15px;">
                © Copyright <b class="strong-blue">Adventurer</b> Reserved
            </span>
        </div>
    </div>
</div>