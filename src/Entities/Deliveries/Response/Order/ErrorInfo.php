<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class ErrorInfo extends Entity
{
    /**
     * @required
     * @var string Error code
     * Enum: "Common" "IllegalDeliveryStatus" "CustomerNameNotSpecified" "ProductNotFound" "MarketingSourceNotFound" "PaymentTypeNotFound" "ProductSizeNotFound" "ProductGroupNotFound" "OrderNotFound" "ConceptionNotFound" "DuplicatedOrderId" "TerminalGroupIdNotDetermined" "TerminalGroupUnregistered" "InvalidPhone" "ModifierDuplicated" "ProductCanBuyFromCashdesk" "DeliveryOpinionMarkInvalid" "WrongDeliveryStatusForOpinion" "OpinionCommentTooLong" "SurveyItemNotFound" "PaymentTypeCanNotBeUsedAsExternal" "AddressNotFound" "HomeNotFound" "IikonetPaymentAdditionalDataCanNotBeParsed" "IikonetPaymentExternalIdNotFound" "IikonetPaymentSumLessThanMarketingDiscount" "DiscountCardNotFound" "DiscountCardTypeModeForbidden" "Iikocard5PaymentAdditionalDataCanNotBeParsed" "Iikocard5PaymentExternalIdNotFound" "Iikocard5PaymentSumLessThanMarketingDiscount" "Iikocard5PaymentCanNotCreateCustomData" "CourierIdDoesNotExist" "CourierDoesNotOwnOrder" "WrongDeliveryStatus" "CanNotAssignCourierToOrder" "UserNotFoundByExternalPassword" "UserNotFound" "Iikocard51PaymentAdditionalDataCanNotBeParsed" "Iikocard51PaymentCredentialNotFound" "Iikocard51PaymentSearchScopeNotFound" "ComboDuplicated" "InvalidReferenceToCombo" "InvalidComboItemsAmount" "InvalidComboItemsGuest" "InvalidReferenceToGuest" "GuestDuplicated" "GuestNameNotSpecified" "OrderTypeNotFound" "OrderServiceTypeDoesNotMatchSelfServiceMode" "DeliveryDateNotSpecified" "OrderStatusChangedInIikoFront" "PaymentAdditionalDataTooLong" "PaymentSumShouldBePositive" "DiscountSumNotSpecified" "InvalidDiscountItem" "RequestProductPriceIsNotEqualToFrontPrice" "OrderItemsNotExists" "EntityAlreadyInUse" "DiscountItemPositionNotFound" "DiscountItemDuplicatePositions" "NonUnqiueOrderItemPosition" "EmptyOrderItemPosition" "IncorrectOrderType" "Incorrect" "TerminalGroupDisabled" "OrganizationUnregistered" "OrganizationDisabled" "TooSmallDeliveryDate" "IikoFrontTooOldVersion" "InternalServerError" "UnknownError"
     */
    public string $code;

    /**
     * @var string|null Nonlocalized message
     */
    public ?string $message = null;

    /**
     * @var string|null Localized message
     */
    public ?string $description = null;

    /**
     * @var mixed Additional information
     */
    public mixed $additionalData = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->code = $data['code'];
            $this->message = $data['message'] ?? null;
            $this->description = $data['description'] ?? null;
            $this->additionalData = $data['additionalData'] ?? null;
        }
    }
}
