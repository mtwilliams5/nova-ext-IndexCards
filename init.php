<?php

$this->event->listen(['template', 'render', 'data', 'main', 'index'], function($event){
    $event['data']['javascript']
        .= $this->extension['IndexCards']->inline_css('index_cards', 'main', $event['data']);
});

$this->event->listen(['location', 'view', 'data', 'main', 'main_index'], function($event){
    $msg_welcome = $event['data']['msg_welcome'];
    $event['data']['msg_welcome'] = '<div id="welcome-message">' . $msg_welcome . '</div>';
});

$this->event->listen(['location', 'view', 'output', 'main', 'main_index'], function($event){
    $cards = [];

    foreach ($this->msgs->get_all_messages()->result() as $row)
    {
        if(strpos($row->message_key, 'index-card-') === 0){
            $cards[substr($row->message_key, 6)]['title'] = $row->message_label;
            $cards[substr($row->message_key, 6)]['content'] = $row->message_content;
        }

        if(strpos($row->message_key, 'footer-index-card-') === 0){
            $cards[substr($row->message_key, 13)]['footer'] = $row->message_content;
        }
    }

    ksort($cards);

    $event['data']['cards'] = $cards;

    $event['output'] .= $this->extension['jquery']['generator']
        ->select('#welcome-message+p+br')
        ->after($this->extension['IndexCards']->view('main_index', $this->skin, 'main', $event['data']));
});