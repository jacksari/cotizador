$(function() {

    //Wait for Pinegrow to wake-up
    $("body").one("pinegrow-ready", function(e, pinegrow) {

        //Create new Pinegrow framework object
        var f = new PgFramework("UserLib", "UserLib");

        //This will prevent activating multiple versions of this framework being loaded
        f.type = "UserLib";
        f.allow_single_type = true;
        f.user_lib = true

        var comp_comp1 = new PgComponentType('comp1', 'Comp 1 / Div');
        comp_comp1.code = '<p>Suspendisse ac pretium sapien, placerat lacinia enim. Fusce eu elit quis lacus cursus mollis. In feugiat diam id sem consectetur, id accumsan risus venenatis.</p>';
        comp_comp1.parent_selector = null;
        f.addComponentType(comp_comp1);
        
        var comp_comp2 = new PgComponentType('comp2', 'Comp 2 / Div');
        comp_comp2.code = '<div class="col-md-5">\
    <h2>Everything is awesome!</h2>\
    <p>Suspendisse ac pretium sapien, placerat lacinia enim. Fusce eu elit quis lacus cursus mollis. In feugiat diam id sem consectetur, id accumsan risus venenatis.</p>\
</div>';
        comp_comp2.parent_selector = '.row';
        f.addComponentType(comp_comp2);
        
        //Tell Pinegrow about the framework
        pinegrow.addFramework(f);
            
        var section = new PgFrameworkLibSection("UserLib_lib", "Components");
        //Pass components in array
        section.setComponentTypes([comp_comp1, comp_comp2]);

        f.addLibSection(section);
   });
});