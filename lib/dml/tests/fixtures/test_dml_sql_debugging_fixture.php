<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Test SQL debugging fixture
 *
 * @package    core
 * @category   dml
 * @copyright  2020 Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Test SQL debugging fixture
 *
 * @package    core
 * @category   dml
 * @copyright  2020 Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class test_dml_sql_debugging_fixture {
    /**
     * Constructor
     * @param \moodle_database $db The database handle to use for this fixture
     */
    public function __construct(
        /** @var \moodle_database The database handle to use for this fixture */
        private \moodle_database $db,
    ) {
    }

    /**
     * Get db handle
     * @return a db handle
     */
    public function get_mock() {
        return $this->db;
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function one(string $sql) {
        $method = new \ReflectionMethod($this->db, 'add_sql_debugging');
        return $method->invoke($this->db, $sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function two(string $sql) {
        return $this->one($sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function three(string $sql) {
        return $this->two($sql);
    }

    /**
     * Test caller in stacktrace
     * @param string $sql original sql
     * @return string sql with comments
     */
    public function four(string $sql) {
        return $this->three($sql);
    }

}
