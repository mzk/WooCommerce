( function( $ ) {

	$( document ).ready(function( ) {
		$( 'input[name="packetery_deliver_on"]' ).datepicker( 'option', 'minDate', datePickerSettings.deliverOnMinDate );
		var $invoiceIssueDate = $( '.packetery-customs-declaration-fields input[name="packetery_customs_declaration[invoice_issue_date]"]' );
		$invoiceIssueDate.datepicker(
			{
				dateFormat: datePickerSettings.dateFormat,
				onSelect: function() {
					Nette.validateControl(this);
				}
			}
		);
		$invoiceIssueDate.closest('form').attr('enctype', 'multipart/form-data');
	}).on('change', '.packetery-customs-declaration-fields [name="packetery_customs_declaration[ead]"]', function( e ) {
		var $form = $(e.target).closest('form');

		Nette.validateControl( $form.find('input[name="packetery_customs_declaration[invoice_file]"]')[0] );
		Nette.validateControl( $form.find('input[name="packetery_customs_declaration[ead_file]"]')[0] );
		Nette.validateControl( $form.find('input[name="packetery_customs_declaration[mrn]"]')[0] );
	}).on( 'click', '[data-packetery-open-modal]', function( e ) {
		var $target = $( e.target );

		$target.WCBackboneModal( {
			template: $target.closest( '[data-packetery-open-modal]' ).data( 'packetery-open-modal' )
		} );
	});

	$( window ).bind( 'beforeunload', function() {
		$( '[data-packetery-label-print-modal] .modal-close:first' ).click();
	} );

	new PacketeryMultiplier('[data-packetery-customs-declaration-item]');

} )( jQuery );
