( function( api ) {

	// Extends our custom "expert-healthcare" section.
	api.sectionConstructor['expert-healthcare'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );