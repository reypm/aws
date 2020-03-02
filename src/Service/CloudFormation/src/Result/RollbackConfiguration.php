<?php

namespace AsyncAws\CloudFormation\Result;

class RollbackConfiguration
{
    private $RollbackTriggers = [];

    private $MonitoringTimeInMinutes;

    /**
     * @param array{
     *   RollbackTriggers: null|\AsyncAws\CloudFormation\Result\RollbackTrigger[],
     *   MonitoringTimeInMinutes: null|int,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->RollbackTriggers = array_map(function ($item) { return RollbackTrigger::create($item); }, $input['RollbackTriggers'] ?? []);
        $this->MonitoringTimeInMinutes = $input['MonitoringTimeInMinutes'];
    }

    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    /**
     * The amount of time, in minutes, during which CloudFormation should monitor all the rollback triggers after the stack
     * creation or update operation deploys all necessary resources.
     */
    public function getMonitoringTimeInMinutes(): ?int
    {
        return $this->MonitoringTimeInMinutes;
    }

    /**
     * @return RollbackTrigger[]
     */
    public function getRollbackTriggers(): array
    {
        return $this->RollbackTriggers;
    }
}
