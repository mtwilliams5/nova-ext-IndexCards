<?php

$this->event->listen(['location', 'view', 'output', 'main', 'index'], function($event){
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

  asort($cards);

  $event['data']['cards'] = $cards;
  $event['data']['javascript'] .= '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
  $event['output'] .= $this->extension['jquery']['generator']
      ->select('#tabs')
      ->before($this->extension['IndexCards']->view('main_index', $this->skin, 'main', $event['data']));
});