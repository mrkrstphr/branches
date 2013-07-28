<?php

namespace Branches\Persistence\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130705191350 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE locations (
            id BIGSERIAL PRIMARY KEY,
            description VARCHAR(120),
            address1 VARCHAR(60),
            address2 VARCHAR(60),
            address3 VARCHAR(60),
            city VARCHAR(60),
            state_province VARCHAR(60),
            postal_code VARCHAR(10),
            country VARCHAR(60),
            phone VARCHAR(25),
            latitude DOUBLE PRECISION,
            longitude DOUBLE PRECISION,
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE sources (
            id BIGSERIAL PRIMARY KEY,
            title VARCHAR(255),
            author VARCHAR(255),
            publication VARCHAR(255),
            agency VARCHAR(120),
            abbr VARCHAR(60),
            text VARCHAR(255),
            rin VARCHAR(12),
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE notes (
            id BIGSERIAL PRIMARY KEY,
            note TEXT,
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE people (
            id BIGSERIAL PRIMARY KEY,
            ref_id VARCHAR(50),
            gender VARCHAR(1) NOT NULL,
            created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITHOUT TIME ZONE
        );';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationships (
            id BIGSERIAL PRIMARY KEY,
            ref_id VARCHAR(50),
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE attributes (
            id BIGSERIAL PRIMARY KEY,
            location_id BIGINT REFERENCES locations(id) ON DELETE CASCADE ON UPDATE CASCADE,
            type VARCHAR(4),
            description VARCHAR(255), 
            date VARCHAR(100),
            stamp VARCHAR(8), 
            certainty INT NOT NULL,
            age VARCHAR(12),
            cause VARCHAR(90)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE events (
            id BIGSERIAL PRIMARY KEY,
            location_id BIGINT REFERENCES locations(id) ON DELETE CASCADE ON UPDATE CASCADE,
            type VARCHAR(4), 
            date VARCHAR(100),
            stamp VARCHAR(8), 
            certainty INT NOT NULL, 
            age VARCHAR(12), 
            cause VARCHAR(90)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE person_names (
            id BIGSERIAL PRIMARY KEY,
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            given_name VARCHAR(120),
            surname VARCHAR(120),
            prefix VARCHAR(30),
            suffix VARCHAR(30),
            nickname VARCHAR(30),
            certainty INT NOT NULL,
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE name_sources (
            source_id BIGINT REFERENCES sources(id) ON DELETE CASCADE ON UPDATE CASCADE,
            name_id BIGINT REFERENCES person_names(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(source_id, name_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_people (
            relationship_id BIGINT REFERENCES relationships(id) ON DELETE CASCADE ON UPDATE CASCADE,
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(relationship_id, person_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE person_events (
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            event_id BIGINT REFERENCES events(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(person_id, event_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE person_attributes (
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            attribute_id BIGINT REFERENCES attributes(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(person_id, attribute_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE person_sources (
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            source_id BIGINT REFERENCES sources(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(person_id, source_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE person_notes (
            person_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE,
            note_id BIGINT REFERENCES notes(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(person_id, note_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_events (
            relationship_id BIGINT REFERENCES relationships(id) ON DELETE CASCADE ON UPDATE CASCADE,
            event_id BIGINT REFERENCES events(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(relationship_id, event_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_notes (
            relationship_id BIGINT REFERENCES relationships(id) ON DELETE CASCADE ON UPDATE CASCADE,
            note_id BIGINT REFERENCES notes(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(relationship_id, note_id)
         )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_sources (
            relationship_id BIGINT REFERENCES relationships(id) ON DELETE CASCADE ON UPDATE CASCADE,
            source_id BIGINT REFERENCES sources(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(relationship_id, source_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE note_sources (
            note_id BIGINT REFERENCES notes(id) ON DELETE CASCADE ON UPDATE CASCADE,
            source_id BIGINT REFERENCES sources(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(note_id, source_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_children (
            id BIGSERIAL PRIMARY KEY,
            relationship_id BIGINT REFERENCES relationships(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
            child_id BIGINT REFERENCES people(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
            pedigree VARCHAR(7) NOT NULL,
            created TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT now(),
            updated TIMESTAMP(0) WITH TIME ZONE
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_children_notes (
            note_id BIGINT REFERENCES notes(id) ON DELETE CASCADE ON UPDATE CASCADE,
            relationship_children_id BIGINT REFERENCES relationship_children(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(note_id, relationship_children_id)
        )';

        $this->addSql($sql);

        $sql = 'CREATE TABLE relationship_children_sources (
            source_id BIGINT REFERENCES sources(id) ON DELETE CASCADE ON UPDATE CASCADE,
            relationship_children_id BIGINT REFERENCES relationship_children(id) ON DELETE CASCADE ON UPDATE CASCADE,
            PRIMARY KEY(source_id, relationship_children_id)
        )';

        $this->addSql($sql);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE relationship_children_sources');
        $this->addSql('DROP TABLE relationship_children_notes');
        $this->addSql('DROP TABLE relationship_children');
        $this->addSql('DROP TABLE note_sources');
        $this->addSql('DROP TABLE name_sources');
        $this->addSql('DROP TABLE relationship_sources');
        $this->addSql('DROP TABLE relationship_notes');
        $this->addSql('DROP TABLE relationship_events');
        $this->addSql('DROP TABLE relationship_people');
        $this->addSql('DROP TABLE relationships');
        $this->addSql('DROP TABLE person_names');
        $this->addSql('DROP TABLE person_events');
        $this->addSql('DROP TABLE person_attributes');
        $this->addSql('DROP TABLE person_notes');
        $this->addSql('DROP TABLE person_sources');
        $this->addSql('DROP TABLE people');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE attributes');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP TABLE sources');
        $this->addSql('DROP TABLE locations');
    }
}
