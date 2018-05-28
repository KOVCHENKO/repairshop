<?php

namespace App\src\Services;

use App\src\Repositories\OrderRepository;
use Barryvdh\DomPDF\Facade;

class ExportService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function exportToPdf($orderId)
    {
        $singleOrder = $this->orderRepository->getById($orderId);

        $html = '<h3>Заказ №'.$orderId.'</h3>';
        $html.= '<h4>Стоимость выполнения: '.$singleOrder->total_cost.' рублей</h4>';
        $html.= '<br>';
        $html.= '<p>Дата выполнения: '.$singleOrder->completion_date.'</p>';
        $html.= '<br>';
        $html.= '<h4>Информация об услугах:</h4>';

        foreach ($singleOrder->services as $singleChosenService) {
            $html.= '<p>Наименование: '.$singleChosenService->name.', Описание: '.$singleChosenService->description.'</p>';
            $html.= '<p></p>';
        }

        $html.= '<h4>Информация об авто:</h4>';
        $html.= '<p>vin номер: '.$singleOrder->auto->vin.'</p>';
        $html.= '<p>рег.номер: '.$singleOrder->auto->reg_number.'</p>';
        $html.= '<p>дата выпуска: '.$singleOrder->auto->year.'</p>';
        $html.= '<p>тип трансмиссии: '.$singleOrder->auto->transmission.'</p>';
        $html.= '<p>марка: '.$singleOrder->auto->brand.'</p>';

        $html.= '<br>';
        $html.= '<h4>Информация о клиенте:</h4>';
        $html.= '<p>Клиент: '.$singleOrder->customer->name.'</p>';

        $html.= '<br>';
        $html.= '<h4>Информация о мастерах:</h4>';

        foreach ($singleOrder->masters as $singleChosenMaster) {
            $html.= '<p>Имя: '.$singleChosenMaster->name.', <p>Должность: '.$singleChosenMaster->position.'</p>';
        }

        $html.= '<p>Клиент: '.$singleOrder->customer->name.'</p>';

        $html.= "<br><br>";

        $pdf = Facade::loadHTML($html);
        return $pdf->stream();
    }

}