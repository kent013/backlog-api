<?php

namespace Itigoppo\BacklogApi\Backlog;

use Itigoppo\BacklogApi\Connector\Connector;

class Projects
{
    protected $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * プロジェクト一覧の取得
     *
     * @param  array  $query_options
     * @return mixed|string
     */
    public function load(array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get('projects', [], $query_params);
    }

    /**
     * Add Project
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-project/
     *
     * @param  string  $project_key
     * @param string $text_formatting_rule
     * @param bool $chart_enabled
     * @param bool $subtasking_enabled
     * @param array $form_options
     *
     * @return mixed|string
     */
    public function create(
        string $project_key,
        string $text_formatting_rule = 'markdown',
        bool $chart_enabled = false,
        bool $subtasking_enabled = false,
        array $form_options = []
    ) {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'key' => $project_key,
                'textFormattingRule' => $text_formatting_rule,
                'chartEnabled' => $chart_enabled,
                'subtaskingEnabled' => $subtasking_enabled
            ] + $form_options;

        return $this->connector->post('projects', $form_params, [], $headers);
    }

    /**
     * プロジェクト情報の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function find(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s', $project_id_or_key));
    }

    /**
     * Update Project
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-project/
     *
     * @param  string  $project_id_or_key
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function update(string $project_id_or_key, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(sprintf('projects/%s', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * Delete Project
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-project/
     *
     * @param  string  $project_id_or_key
     *
     * @return mixed|string
     */
    public function delete(string $project_id_or_key)
    {
        return $this->connector->delete(sprintf('projects/%s/', $project_id_or_key));
    }

    /**
     * Get Project Icon
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-project-icon/
     *
     * @param  string  $project_id_or_key
     *
     * @return mixed|string
     */
    public function image(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/image', $project_id_or_key));
    }

    /**
     * プロジェクトの最近の活動の取得
     *
     * @param  string  $project_id_or_key
     * @param  array  $query_options
     * @return mixed|string
     */
    public function activities(string $project_id_or_key, array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get(sprintf('projects/%s/activities', $project_id_or_key), [], $query_params);
    }

    /**
     * プロジェクトユーザー一覧の取得
     *
     * @param  string  $project_id_or_key
     * @param  array  $query_options
     * @return mixed|string
     */
    public function users(string $project_id_or_key, array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get(sprintf('projects/%s/users', $project_id_or_key), [], $query_params);
    }

    /**
     * Add Project User
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-project-user/
     *
     * @param  string  $project_id_or_key
     * @param  int  $user_id
     *
     * @return mixed|string
     */
    public function createUser(string $project_id_or_key, int $user_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'userId' => $user_id,
        ];

        return $this->connector->post(sprintf('projects/%s/users', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * Delete Project User
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-project-user/
     *
     * @param  string  $project_id_or_key
     * @param  int  $user_id
     *
     * @return mixed|string
     */
    public function deleteUser(string $project_id_or_key, int $user_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'userId' => $user_id,
        ];

        return $this->connector->delete(sprintf('projects/%s/users', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * プロジェクト管理者一覧の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function administrators(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/administrators', $project_id_or_key));
    }

    /**
     * Add Project Administrator
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-project-administrator/
     *
     * @param  string  $project_id_or_key
     * @param  int  $user_id
     *
     * @return mixed|string
     */
    public function createAdministrator(string $project_id_or_key, int $user_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'userId' => $user_id,
        ];

        return $this->connector->post(
            sprintf('projects/%s/administrators', $project_id_or_key),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Delete Project Administrator
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-project-administrator/
     *
     * @param  string  $project_id_or_key
     * @param  int  $user_id
     *
     * @return mixed|string
     */
    public function deleteAdministrator(string $project_id_or_key, int $user_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'userId' => $user_id,
        ];

        return $this->connector->delete(
            sprintf('projects/%s/administrators', $project_id_or_key),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * プロジェクト情報の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function statuses(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/statuses', $project_id_or_key));
    }

    /**
     * Add Status
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-status/
     *
     * @param  string  $project_id_or_key
     * @param  string  $name
     * @param  string  $color
     *
     * @return mixed|string
     */
    public function createStatus(string $project_id_or_key, string $name, string $color)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'name' => $name,
            'color' => $color
        ];

        return $this->connector->post(sprintf('projects/%s/statuses', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * Update Status
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-status
     *
     * @param  string  $project_id_or_key
     * @param  int  $status_id
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function updateStatus(string $project_id_or_key, int $status_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(
            sprintf('projects/%s/statuses/%d', $project_id_or_key, $status_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Delete Status
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-status/
     *
     * @param  string  $project_id_or_key
     * @param  int  $status_id
     * @param  int  $substitute_status_id
     *
     * @return mixed|string
     */
    public function deleteStatus(string $project_id_or_key, int $status_id, int $substitute_status_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'substituteStatusId' => $substitute_status_id
        ];

        return $this->connector->delete(
            sprintf('projects/%s/statuses/%d', $project_id_or_key, $status_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Update Order of Status
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-order-of-status/
     *
     * @param  string  $project_id_or_key
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function updateStatusOrder(string $project_id_or_key, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(
            sprintf('projects/%s/statuses/updateDisplayOrder', $project_id_or_key),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * 種別一覧の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function issueTypes(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/issueTypes', $project_id_or_key));
    }

    /**
     * 種別の追加
     *
     * @param  string  $project_id_or_key
     * @param  string  $name
     * @param  string  $color
     * @param  array  $form_options
     * @return mixed|string
     */
    public function createIssueType(string $project_id_or_key, string $name, string $color, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'name' => $name,
                'color' => $color,
            ] + $form_options;

        return $this->connector->post(
            sprintf(
                'projects/%s/issueTypes',
                $project_id_or_key
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * 種別情報の更新
     *
     * @param  string  $project_id_or_key
     * @param  int  $issue_type_id
     * @param  array  $form_options
     * @return mixed|string
     */
    public function updateIssueType(string $project_id_or_key, int $issue_type_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(
            sprintf(
                'projects/%s/issueTypes/%d',
                $project_id_or_key,
                $issue_type_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * 種別の削除
     *
     * @param  string  $project_id_or_key
     * @param  int  $issue_type_id
     * @param  int  $substitute_issue_type_id
     * @return mixed|string
     */
    public function deleteIssueType(string $project_id_or_key, int $issue_type_id, int $substitute_issue_type_id)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'substituteIssueTypeId' => $substitute_issue_type_id,
        ];

        return $this->connector->delete(
            sprintf(
                'projects/%s/issueTypes/%d',
                $project_id_or_key,
                $issue_type_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * カテゴリー一覧の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function categories(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/categories', $project_id_or_key));
    }

    /**
     * カテゴリーの追加
     *
     * @param  string  $project_id_or_key
     * @param  string  $name
     * @return mixed|string
     */
    public function createCategory(string $project_id_or_key, string $name)
    {

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'name' => $name,
        ];

        return $this->connector->post(
            sprintf(
                'projects/%s/categories',
                $project_id_or_key
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * カテゴリー情報の更新
     *
     * @param  string  $project_id_or_key
     * @param  int  $category_id
     * @param  string  $name
     * @return mixed|string
     */
    public function updateCategory(string $project_id_or_key, int $category_id, string $name)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'name' => $name,
        ];

        return $this->connector->patch(
            sprintf(
                'projects/%s/categories/%d',
                $project_id_or_key,
                $category_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * カテゴリーの削除
     *
     * @param  string  $project_id_or_key
     * @param  int  $category_id
     * @return mixed|string
     */
    public function deleteCategory(string $project_id_or_key, int $category_id)
    {
        return $this->connector->delete(sprintf('projects/%s/categories/%d', $project_id_or_key, $category_id));
    }

    /**
     * バージョン(マイルストーン)一覧の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function versions(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/versions', $project_id_or_key));
    }

    /**
     * バージョン(マイルストーン)の追加
     *
     * @param  string  $project_id_or_key
     * @param  string  $name
     * @param  array  $form_options
     * @return mixed|string
     */
    public function createVersion(string $project_id_or_key, string $name, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'name' => $name,
            ] + $form_options;

        return $this->connector->post(sprintf('projects/%s/versions', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * バージョン(マイルストーン)情報の更新
     *
     * @param  string  $project_id_or_key
     * @param  int  $version_id
     * @param  string  $name
     * @param  array  $form_options
     * @return mixed|string
     */
    public function updateVersion(string $project_id_or_key, int $version_id, string $name, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'name' => $name,
            ] + $form_options;

        return $this->connector->patch(
            sprintf(
                'projects/%s/versions/%d',
                $project_id_or_key,
                $version_id
            ),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * バージョン(マイルストーン)の削除
     *
     * @param  string  $project_id_or_key
     * @param  int  $version_id
     * @return mixed|string
     */
    public function deleteVersion(string $project_id_or_key, int $version_id)
    {
        return $this->connector->delete(sprintf('projects/%s/versions/%d', $project_id_or_key, $version_id));
    }

    /**
     * Get Custom Field List
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-custom-field-list/
     *
     * @param  string  $project_id_or_key
     *
     * @return mixed|string
     */
    public function customFields(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/customFields', $project_id_or_key));
    }

    /**
     * Add Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $type_id
     * @param  string  $name
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function createCustomField(string $project_id_or_key, int $type_id, string $name, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
                'typeId' => $type_id,
                'name' => $name
            ] + $form_options;

        return $this->connector->post(
            sprintf('projects/%s/customFields', $project_id_or_key),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Update Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $custom_id
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function updateCustomField(string $project_id_or_key, int $custom_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->post(
            sprintf('projects/%s/customFields/%d', $project_id_or_key, $custom_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Delete Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $custom_id
     *
     * @return mixed|string
     */
    public function deleteCustomField(string $project_id_or_key, int $custom_id)
    {
        return $this->connector->delete(sprintf('projects/%s/customFields/%d', $project_id_or_key, $custom_id));
    }

    /**
     * Add List Item for List Type Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/add-list-item-for-list-type-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $custom_id
     * @param  string  $name
     *
     * @return mixed|string
     */
    public function createListItemForCustomField(string $project_id_or_key, int $custom_id, string $name)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'name' => $name,
        ];

        return $this->connector->post(
            sprintf('projects/%s/customFields/%d/items', $project_id_or_key, $custom_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Update List Item for List Type Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-list-item-for-list-type-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $custom_id
     * @param  int  $item_id
     * @param  string  $name
     *
     * @return mixed|string
     */
    public function updateListItemForCustomField(string $project_id_or_key, int $custom_id, int $item_id, string $name)
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            'name' => $name,
        ];

        return $this->connector->patch(
            sprintf('projects/%s/customFields/%d/items/%d', $project_id_or_key, $custom_id, $item_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Delete List Item for List Type Custom Field
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-list-item-for-list-type-custom-field/
     *
     * @param  string  $project_id_or_key
     * @param  int  $custom_id
     * @param  int  $item_id
     *
     * @return mixed|string
     */
    public function deleteListItemForCustomField(string $project_id_or_key, int $custom_id, int $item_id)
    {
        return $this->connector->delete(
            sprintf('projects/%s/customFields/%d/items/%d', $project_id_or_key, $custom_id, $item_id)
        );
    }

    /**
     * Get List of Shared Files
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-list-of-shared-files/
     *
     * @param  string  $project_id_or_key
     * @param  string  $path
     * @param  array  $query_options
     *
     * @return mixed|string
     */
    public function sharedFiles(string $project_id_or_key, string $path, array $query_options = [])
    {
        $query_params = [
            ] + $query_options;

        return $this->connector->get(
            sprintf('projects/%s/files/metadata/%s', $project_id_or_key, $path),
            [],
            $query_params
        );
    }

    /**
     * Get File
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-file/
     *
     * @param  string  $project_id_or_key
     * @param  int  $file_id
     *
     * @return mixed|string
     */
    public function findFile(string $project_id_or_key, int $file_id)
    {
        return $this->connector->get(sprintf('projects/%s/files/%d', $project_id_or_key, $file_id));
    }

    /**
     * プロジェクトの容量使用状況の取得
     *
     * @param  string  $project_id_or_key
     * @return mixed|string
     */
    public function diskUsage(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/diskUsage', $project_id_or_key));
    }

    /**
     * Get List of Webhooks
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-list-of-webhooks/
     *
     * @param  string  $project_id_or_key
     *
     * @return mixed|string
     */
    public function webhooks(string $project_id_or_key)
    {
        return $this->connector->get(sprintf('projects/%s/webhooks', $project_id_or_key));
    }

    /**
     * Add Webhook
     *
     * @apihttps://developer.nulab.com/docs/backlog/api/2/add-webhook/
     *
     * @param  string  $project_id_or_key
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function createWebhook(string $project_id_or_key, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->post(sprintf('projects/%s/webhooks', $project_id_or_key), $form_params, [], $headers);
    }

    /**
     * Get Webhook
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/get-webhook/
     *
     * @param  string  $project_id_or_key
     * @param  string  $webhook_id
     *
     * @return mixed|string
     */
    public function findWebhook(string $project_id_or_key, string $webhook_id)
    {
        return $this->connector->get(sprintf('projects/%s/webhooks/%s', $project_id_or_key, $webhook_id));
    }

    /**
     * Update Webhook
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/update-webhook/
     *
     * @param  string  $project_id_or_key
     * @param  string  $webhook_id
     * @param  array  $form_options
     *
     * @return mixed|string
     */
    public function updateWebhook(string $project_id_or_key, string $webhook_id, array $form_options = [])
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $form_params = [
            ] + $form_options;

        return $this->connector->patch(
            sprintf('projects/%s/webhooks/%s', $project_id_or_key, $webhook_id),
            $form_params,
            [],
            $headers
        );
    }

    /**
     * Delete Webhook
     *
     * @api https://developer.nulab.com/docs/backlog/api/2/delete-webhook/
     *
     * @param  string  $project_id_or_key
     * @param  string  $webhook_id
     *
     * @return mixed|string
     */
    public function deleteWebhook(string $project_id_or_key, string $webhook_id)
    {
        return $this->connector->delete(sprintf('projects/%s/webhooks/%s', $project_id_or_key, $webhook_id));
    }
}
