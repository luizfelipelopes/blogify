Approach Solution


Post

posts
- id
- title
- content
- status (draft / published) p.s: is draft by default
- source
- external_id

Post model
PostController => crud

ROUTES

GET /posts 
GET /posts/{id} 
PUT /posts/{id}
DELETE /posts/{id}

Import Posts functionality
button

import from sources API
JSONPlaceholder
FakeStore

    create a service to recover the sources
    treat the response
    insert the data on posts table with draft default status
    prevent duplication using external_id and source fields


    import source service
        import service
            Import service interface => 
            JSONPlaceholderService
            FakeStore

        merge this data in a collection
        insert this information in my data base
            prevent duplication using external_id and source fields


