<?php

namespace App\src\Services;

use App\src\Repositories\OrderRepository;
use App\src\Repositories\ServiceRepository;
use App\src\Repositories\SpareRepository;
use Barryvdh\DomPDF\Facade;

class ExportService
{
    protected $orderRepository;
    protected $serviceRepository;
    protected $spareRepository;

    public function __construct(OrderRepository $orderRepository, ServiceRepository $serviceRepository, SpareRepository $spareRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->serviceRepository = $serviceRepository;
        $this->spareRepository = $spareRepository;
    }

    public function exportToPdf($orderId)
    {
        $singleOrder = $this->orderRepository->getById($orderId);

        /* Про заказ в общем */
        $html = '<div style="font-size: 10pt">';
        $html.= '<h3>Заказ №'.$orderId.'</h3>';
        $html.= '<h4>Стоимость выполнения: '.$singleOrder->total_cost.' рублей</h4>';
        $html.= '<p>Дата приема заказа: '.$singleOrder->created_at.'</p>';
        $html.= '<p>Дата завершения: '.$singleOrder->completion_date.'</p>';
        $html.= '<h4>Информация об услугах:</h4>';

        /* Про услуги в заказе */
        foreach ($singleOrder->services as $singleChosenService) {
            $html.= '<p>Наименование: '.$singleChosenService->name.
                '<br>Описание: '.$singleChosenService->description.
                '<br>Наценка: '.$singleChosenService->cost.'</p>';
            $html.= '<p></p>';
            $serviceSpares = $this->serviceRepository->getByIdWithSpares($singleChosenService->id);

            $html .= "<table style='border-collapse: collapse; border:1px solid; width:100%'>";
            $html .= "<tr>
                        <td style='border:1px solid;'>№</td>
                        <td style='border:1px solid;'>Наименование</td>
                        <td style='border:1px solid;'>Стоимость за ед. (руб.)</td>
                        <td style='border:1px solid;'>Необходимое кол-во (ед.)</td>
                        <td style='border:1px solid;'>Стоимость (руб.)</td>
                      </tr>";


            foreach ($serviceSpares->spares as $k => $singleSpare) {
                $index = $k + 1;
                $sparesCost = $singleSpare->service_quantity * $singleSpare->cost;
                $html .= "<tr>
                            <td style='border:1px solid;'>{$index}</td>
                            <td style='border:1px solid;'>{$singleSpare->name}</td>
                            <td style='border:1px solid;'>{$singleSpare->cost}</td>
                            <td style='border:1px solid;'>{$singleSpare->service_quantity}</td>
                            <td style='border:1px solid;'>{$sparesCost}</td>
                          </tr>";
            }

            $html .= "</table>";
        }

        /* Про отдельные запчасти */

        $html.= '<br>';
        $html.= '<h4>Информация о запчастях:</h4>';

        $html .= "<table style='border-collapse: collapse; border:1px solid; width:100%'>";
        $html .= "<tr>
                        <td style='border:1px solid;'>№</td>
                        <td style='border:1px solid;'>Наименование</td>
                        <td style='border:1px solid;'>Стоимость за ед. (руб.)</td>
                        <td style='border:1px solid;'>Необходимое кол-во (ед.)</td>
                        <td style='border:1px solid;'>Стоимость (руб.)</td>
                  </tr>";

        foreach ($singleOrder->spares as $k => $singleOrderSpare) {
            $index = $k + 1;
            $sparesOrderCost = $singleSpare->service_quantity * $singleOrderSpare->cost;
            $html .= "<tr>
                            <td style='border:1px solid;'>{$index}</td>
                            <td style='border:1px solid;'>{$singleOrderSpare->name}</td>
                            <td style='border:1px solid;'>{$singleOrderSpare->cost}</td>
                            <td style='border:1px solid;'>{$singleOrderSpare->order_quantity}</td>
                            <td style='border:1px solid;'>{$sparesOrderCost}</td>
                          </tr>";
        }

        $html .= "</table>";


        /* Про авто */
        $html.= '<h4>Информация об авто:</h4>';
        $html.= '<p>vin номер: '.$singleOrder->auto->vin.'</p>';
        $html.= '<p>рег.номер: '.$singleOrder->auto->reg_number.'</p>';
        $html.= '<p>дата выпуска: '.$singleOrder->auto->year.'</p>';
        $html.= '<p>тип трансмиссии: '.$singleOrder->auto->transmission.'</p>';
        $html.= '<p>кузов: '.$singleOrder->auto->frame.'</p>';
        $html.= '<p>марка: '.$singleOrder->auto->brand.'</p>';
        $html.= '<p>пробег: '.$singleOrder->auto->mileage.'</p>';

        $html.= '<br>';
        $html.= '<h4>Информация о клиенте:</h4>';
        $html.= '<p>Клиент: '.$singleOrder->customer->name.'</p>';
        $html.= '<p>Телефон: '.$singleOrder->customer->phone.'</p>';

        $html.= '<br>';
        $html.= '<h4>Информация о мастерах:</h4>';

        $html .= "<table style='border-collapse: collapse; border:1px solid; width:100%'>";
        $html .= "<tr>
                        <td style='border:1px solid;'>№</td>
                        <td style='border:1px solid;'>Имя</td>
                        <td style='border:1px solid;'>Должность</td>
                        <td style='border:1px solid;'>Ставка/ч</td>
                        <td style='border:1px solid;'>Часы работы</td>
                        <td style='border:1px solid;'>Итого</td>
                      </tr>";

        foreach ($singleOrder->masters as $singleChosenMaster) {
                $index = $k + 1;
                $masterCost = $singleChosenMaster->rate * $singleChosenMaster->pivot->labor_hours;
                $html .= "<tr>
                            <td style='border:1px solid;'>{$index}</td>
                            <td style='border:1px solid;'>{$singleChosenMaster->name}</td>
                            <td style='border:1px solid;'>{$singleChosenMaster->position}</td>
                            <td style='border:1px solid;'>{$singleChosenMaster->rate}</td>
                            <td style='border:1px solid;'>{$singleChosenMaster->pivot->labor_hours}</td>
                            <td style='border:1px solid;'>{$masterCost}</td>
                          </tr>";

            $html .= "</table>";

        }

        $html.= "<br><br>";
        $html.= '</div>';


        $pdf = Facade::loadHTML($html);
        return $pdf->stream();
    }

}