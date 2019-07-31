//
// jQuery to dynamically replace some text on the page
//

jQuery(window).load(function(){
jQuery('label:contains("Collection")').html('Set')
jQuery('h4:contains("Collection")').html('Set')
jQuery('a:contains("Collections")').html('Sets')
jQuery('a:contains("Add a Collection")').html('Add a Set')
jQuery('p:contains("All items are in a collection.")').html('All items are in a set.')
jQuery('p:contains("Get started by adding your first collection.")').html('Get started by adding your first set.')
jQuery('h2:contains("You have no collections.")').html('You have no sets.')
jQuery('h1:contains("Add a Collection")').html('Add a Set')
jQuery('li:contains("Collection: No Collection")').html('Sets: No Set')
// jQuery('input[name=submit]').val('Add Series');
jQuery('input[class="big green button"]').val('Save Changes');
jQuery('.not-in-collections').contents().filter(function() {
    return this.nodeType == 3
}).each(function(){
    this.textContent = this.textContent.replace(' has no collection.',' has no set.');
});   
jQuery('#content-heading').contents().filter(function() {
    return this.nodeType == 3
}).each(function(){
    this.textContent = this.textContent.replace('Browse Collections','Browse Set');
});    
});
