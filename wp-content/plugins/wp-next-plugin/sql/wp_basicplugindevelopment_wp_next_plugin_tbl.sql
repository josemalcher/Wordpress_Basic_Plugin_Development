create table wp_next_plugin_tbl
(
    id    int auto_increment
        primary key,
    name  text null,
    email text null
);

INSERT INTO wp_basicplugindevelopment.wp_next_plugin_tbl (id, name, email) VALUES (1, 'jose', 'jose@jose.com');
INSERT INTO wp_basicplugindevelopment.wp_next_plugin_tbl (id, name, email) VALUES (2, 'maria eduarda', 'teste@test.com');
INSERT INTO wp_basicplugindevelopment.wp_next_plugin_tbl (id, name, email) VALUES (3, '', '');