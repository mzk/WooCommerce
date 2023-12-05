<?php

namespace Packetery\Core\Api\GeneratedSoap;

use Packetery\Core\Api\GeneratedSoap\Type;
use Packetery\Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;
use Packetery\Phpro\SoapClient\Soap\ClassMap\ClassMap;

class PacketerySoapClassmap
{

    public static function getCollection() : \Packetery\Phpro\SoapClient\Soap\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection([
            new ClassMap('ExternalStatusRecord', Type\ExternalStatusRecord::class),
            new ClassMap('StatusRecord', Type\StatusRecord::class),
            new ClassMap('CurrentStatusRecord', Type\CurrentStatusRecord::class),
            new ClassMap('DispatchOrder', Type\DispatchOrder::class),
            new ClassMap('DispatchOrder2', Type\DispatchOrder2::class),
            new ClassMap('DispatchOrder2Item', Type\DispatchOrder2Item::class),
            new ClassMap('PacketConsignerAttributes', Type\PacketConsignerAttributes::class),
            new ClassMap('PacketAttributes', Type\PacketAttributes::class),
            new ClassMap('PacketsAttributes', Type\PacketsAttributes::class),
            new ClassMap('UpdatePacketAttributes', Type\UpdatePacketAttributes::class),
            new ClassMap('PacketB2BAttributes', Type\PacketB2BAttributes::class),
            new ClassMap('ClaimAttributes', Type\ClaimAttributes::class),
            new ClassMap('ClaimWithPasswordAttributes', Type\ClaimWithPasswordAttributes::class),
            new ClassMap('CustomsDeclarationItems', Type\CustomsDeclarationItems::class),
            new ClassMap('CustomsDeclaration', Type\CustomsDeclaration::class),
            new ClassMap('CustomsDeclarationItem', Type\CustomsDeclarationItem::class),
            new ClassMap('ItemCollection', Type\ItemCollection::class),
            new ClassMap('Item', Type\Item::class),
            new ClassMap('AttributeCollection', Type\AttributeCollection::class),
            new ClassMap('Attribute', Type\Attribute::class),
            new ClassMap('Security', Type\Security::class),
            new ClassMap('AllowTrackingForUsers', Type\AllowTrackingForUsers::class),
            new ClassMap('apiKeys', Type\ApiKeys::class),
            new ClassMap('Services', Type\Services::class),
            new ClassMap('FirstMileCarrierService', Type\FirstMileCarrierService::class),
            new ClassMap('LastMileCarrierService', Type\LastMileCarrierService::class),
            new ClassMap('ReturnDestinationService', Type\ReturnDestinationService::class),
            new ClassMap('ReturnDestinationServiceAddress', Type\ReturnDestinationServiceAddress::class),
            new ClassMap('ReturnDestinationServiceClient', Type\ReturnDestinationServiceClient::class),
            new ClassMap('Size', Type\Size::class),
            new ClassMap('PacketIdDetail', Type\PacketIdDetail::class),
            new ClassMap('PacketDetail', Type\PacketDetail::class),
            new ClassMap('CreatePacketResult', Type\CreatePacketResult::class),
            new ClassMap('CreatePacketsResults', Type\CreatePacketsResults::class),
            new ClassMap('CreatePacketsB2BResults', Type\CreatePacketsB2BResults::class),
            new ClassMap('SenderGetReturnRoutingResult', Type\SenderGetReturnRoutingResult::class),
            new ClassMap('PacketIds', Type\PacketIds::class),
            new ClassMap('PacketIdsWithCourierNumbers', Type\PacketIdsWithCourierNumbers::class),
            new ClassMap('PacketIdWithCourierNumber', Type\PacketIdWithCourierNumber::class),
            new ClassMap('ShipmentIdDetail', Type\ShipmentIdDetail::class),
            new ClassMap('PacketCollection', Type\PacketCollection::class),
            new ClassMap('ShipmentPacketsResult', Type\ShipmentPacketsResult::class),
            new ClassMap('StatusRecords', Type\StatusRecords::class),
            new ClassMap('ExternalStatusRecords', Type\ExternalStatusRecords::class),
            new ClassMap('Contact', Type\Contact::class),
            new ClassMap('Address', Type\Address::class),
            new ClassMap('PacketConsignerDetail', Type\PacketConsignerDetail::class),
            new ClassMap('getConsignmentPasswordResult', Type\GetConsignmentPasswordResult::class),
            new ClassMap('PacketInfoResult', Type\PacketInfoResult::class),
            new ClassMap('CourierInfo', Type\CourierInfo::class),
            new ClassMap('CourierInfoItem', Type\CourierInfoItem::class),
            new ClassMap('CourierNumbers', Type\CourierNumbers::class),
            new ClassMap('CourierBarcodes', Type\CourierBarcodes::class),
            new ClassMap('CourierTrackingNumbers', Type\CourierTrackingNumbers::class),
            new ClassMap('CourierTrackingUrls', Type\CourierTrackingUrls::class),
            new ClassMap('CourierTrackingUrl', Type\CourierTrackingUrl::class),
            new ClassMap('AttributeFault', Type\AttributeFault::class),
            new ClassMap('PacketAttributesFault', Type\PacketAttributesFault::class),
            new ClassMap('attributes', Type\Attributes::class),
            new ClassMap('PacketIdFault', Type\PacketIdFault::class),
            new ClassMap('PacketIdsFault', Type\PacketIdsFault::class),
            new ClassMap('ids', Type\Ids::class),
            new ClassMap('CancelNotAllowedFault', Type\CancelNotAllowedFault::class),
            new ClassMap('NoPacketIdsFault', Type\NoPacketIdsFault::class),
            new ClassMap('CustomBarcodeNotAllowedFault', Type\CustomBarcodeNotAllowedFault::class),
            new ClassMap('ShipmentNotFoundFault', Type\ShipmentNotFoundFault::class),
            new ClassMap('DateOutOfRangeFault', Type\DateOutOfRangeFault::class),
            new ClassMap('UnknownLabelFormatFault', Type\UnknownLabelFormatFault::class),
            new ClassMap('IncorrectApiPasswordFault', Type\IncorrectApiPasswordFault::class),
            new ClassMap('SenderNotExists', Type\SenderNotExists::class),
            new ClassMap('ArgumentsFault', Type\ArgumentsFault::class),
            new ClassMap('InvalidEmailAddressFault', Type\InvalidEmailAddressFault::class),
            new ClassMap('InvalidPhoneNumberFault', Type\InvalidPhoneNumberFault::class),
            new ClassMap('DispatchOrderNotAllowedFault', Type\DispatchOrderNotAllowedFault::class),
            new ClassMap('DispatchOrderInvalidPdfFault', Type\DispatchOrderInvalidPdfFault::class),
            new ClassMap('TooLateToUpdateCodFault', Type\TooLateToUpdateCodFault::class),
            new ClassMap('CodUpdateNotAllowedFault', Type\CodUpdateNotAllowedFault::class),
            new ClassMap('DispatchOrderUnknownCodeFault', Type\DispatchOrderUnknownCodeFault::class),
            new ClassMap('codes', Type\Codes::class),
            new ClassMap('NotSupportedFault', Type\NotSupportedFault::class),
            new ClassMap('ExternalGatewayFault', Type\ExternalGatewayFault::class),
            new ClassMap('InvalidCourierNumber', Type\InvalidCourierNumber::class),
            new ClassMap('AccessDeniedFault', Type\AccessDeniedFault::class),
            new ClassMap('NoPacketCourierDataFault', Type\NoPacketCourierDataFault::class),
            new ClassMap('NullableDate', Type\NullableDate::class),
            new ClassMap('ConsignmentPasswordResult', Type\ConsignmentPasswordResult::class),
            new ClassMap('packetCourierNumberV2Result', Type\PacketCourierNumberV2Result::class),
            new ClassMap('StorageFileAttributes', Type\StorageFileAttributes::class),
            new ClassMap('ListStorageFileAttributes', Type\ListStorageFileAttributes::class),
            new ClassMap('StorageFiles', Type\StorageFiles::class),
            new ClassMap('StorageFile', Type\StorageFile::class),
        ]);
    }


}
