mod {
    wizards.newContentElement.wizardItems.plugins {
        elements {
            gsrf4note_point {
                iconIdentifier = rf_point
                title = Fishspots
                description = Display a list of fishspots
                tt_content_defValues {
                    CType = list
                    list_type = gsrf4note_point
                }
            }
        }
        show := addToList(gsrf4note_point)
    }
}