PROJECT IDEA

1. User can create new help ticket
2. Admin can reply on help ticket
3. Admin can reject or resolved th tickets
4. User can withdraw tickets
5. When admin update the ticket user will get the notification
6. User can give ticket title and description
7. User can upload document like  pdf or image


TABLES

Tickets
    title (string) required
    description (text) required
    status (open {default}, resolved, rejected, withdraw)
    attachment (string) nullable
    user_id required {foreign key for User}
    status_changed_by_id

Replies
    body (text) required
    user_id required {foreign key for User}
    ticket_id required {foreign key for Ticket}

