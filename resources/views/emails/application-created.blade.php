<div style="font-family: Arial, sans-serif; line-height: 1.5;">
    <h2>New Application Received</h2>
    <p><strong>User:</strong> {{ optional($application->user)->name ?? 'Unknown' }}</p>
    <p><strong>Id:</strong> {{ $application->id }}</p>
    <p><strong>Subject:</strong> {{ $application->subject }}</p>
    <p><strong>Message:</strong> {{ $application->message }}</p>
    @if($application->file_url)
        <p><strong>File:</strong> {{ $application->file_url }}</p>
    @endif
</div>
