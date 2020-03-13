<?php

namespace backend\modules\models\OrderModels;

abstract class UserOrderStatus
{
    const BINDING = "binding";
    const IN_PROGRESS = "inProgress";
    const IN_THE_WAY = "inTheWay";
    const DELIVERED = "delivered";
    const CANCELED = "canceled";
}